<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;
use App\Models\Project;

class ProgressController extends Controller
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
        return view('progress.index', compact(['data']));
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
        return view('progress.create',compact('data', 'users'));

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
                $file->storeAs('files', $name);
                $files[] = $name;
            }
         }


         $file= new  Progress();
         $file->user_id = $request->input('user_id');
         $file->project_id = $request->input('project_id');
         $file->status = $request->input('status');
         $file->filenames = $files;
         $file->file_path = $path;
         $file->save();

         return redirect()->route('progress.index')
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
        $data = Project::find($id);
        $project = DB::table('projects')
        ->join('fundings', 'projects.funding_id', '=', 'fundings.id')
          ->select('projects.*', 'fundings.funding_name')->get();
        $users = DB::table('users')->where('id', Auth::user()->id) ->get();
        return view('progress.show',compact('data', 'users', 'project'));
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
        //
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
