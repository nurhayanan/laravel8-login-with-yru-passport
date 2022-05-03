<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Announce;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('announces')
        ->join('years', 'announces.year_id', '=', 'years.id')
        ->join('fundings', 'announces.funding_id', '=', 'fundings.id')
        ->join('agencies', 'announces.agency_id', '=', 'agencies.id')
        ->select('announces.*', 'years.year_name','fundings.funding_name','agencies.agency_name')
        ->get();
        return view('announce.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = DB::table('years')->get();
        $funding = DB::table('fundings')->get();
        $agency = DB::table('agencies')->get();
        return view('announce.create',compact('year','funding','agency'));
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
            'year_id'=>'required',
            'funding_id'=>'required',
            'agency_id'=>'required',
            'start'=>'required',
            'end'=>'required',
            'image' => '',

        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Announce::create($input);
        return redirect('/announce');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('announces')
        ->join('years', 'announces.year_id', '=', 'years.id')
        ->join('fundings', 'announces.funding_id', '=', 'fundings.id')
        ->join('agencies', 'announces.agency_id', '=', 'agencies.id')
        ->select('announces.*', 'years.year_name','fundings.funding_name','agencies.agency_name')
        ->get();
        return view('announce.show',compact('data'));
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
