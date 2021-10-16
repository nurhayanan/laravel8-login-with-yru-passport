<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Contract;
use App\Models\File;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('projects')
        ->where('user_id', Auth::user()->id)
        ->where('status', '=', 1)
        ->get();
        return view('contract.index', compact(['data']));
    }

    public function index1()
    {

        $data = DB::table('contracts')
        ->join('projects', 'contracts.project_id', '=', 'projects.id')
          ->select('contracts.*', 'projects.project_name', 'projects.budget')->get();
        return view('svp.contract.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('projects')
        ->join('fundings', 'projects.funding_id', '=', 'fundings.id')
          ->select('projects.*', 'fundings.funding_name')->get();
        $users = DB::table('users')->where('id', Auth::user()->id) ->get();
        return view('contract.create',compact('data', 'users'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'project_id'=> 'required',
            'date'=> 'required',
            'period'=> 'required',
            'guarantor'=> 'required',
            'filenames' => 'required',
             'filenames.*' => 'required',
            'file_path' => '',
            'status'=> '',
        ]);
        $files = [];
        if($request->hasfile('filenames'))
         {

            foreach($request->file('filenames') as $file)
            {
                $path = $file->store('public/files');
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
         }

         $file= new  Contract();
         $file->user_id = $request->input('user_id');
         $file->project_id = $request->input('project_id');
         $file->date = $request->input('date');
         $file->period = $request->input('period');
         $file->guarantor = $request->input('guarantor');
         $file->status = $request->input('status');
         $file->filenames = $files;
         $file->file_path = $path;
         $file->save();


        return redirect()->route('contract.index')
                        ->with('success','Post created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function show1($id)
    {
        // $users = DB::table('users')->where('id', Auth::user()->id) ->get();
        $project = DB::table('projects')
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->join('fundings', 'projects.funding_id', '=', 'fundings.id')
        ->join('contracts', 'projects.id', '=', 'contracts.project_id')
        ->select('projects.*', 'users.name', 'users.job_position', 'users.department',
        'users.address_present', 'users.mobile' , 'fundings.funding_name' ,
        'contracts.date', 'contracts.period', 'contracts.guarantor', 'contracts.filenames')->get();
        // แสดงผลในตาราง project ตามไอดี project ที่เลือก
        $data = Contract::find($id);
        // ให้แสดงผลที่หน้า svp.project.show
        return view('svp.contract.show',compact('data', 'project' ));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => '',
        ]);
        $data = Contract::find($id);
        $data->status = $request->input('status');
        $data->save();

      return redirect('svp/contract/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
