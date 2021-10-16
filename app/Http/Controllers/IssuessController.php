<?php

namespace App\Http\Controllers;

use App\Models\Issuess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssuessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Issuess::all();
        return view('issuess.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('strategics')->get();
        return view('issuess.create',compact('data'));
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
            'strategic_id' => 'required',
            'issuess_name' => 'required',
        ]);

        Issuess::create($request->all());

        return redirect()->route('issuess.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issuess  $issuess
     * @return \Illuminate\Http\Response
     */
    public function show(Issuess $issuess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issuess  $issuess
     * @return \Illuminate\Http\Response
     */
    public function edit(Issuess $issuess)
    {
        return view('issuess.edit',compact('issuess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issuess  $issuess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issuess $issuess)
    {
        $request->validate([
            'strategic_id' => 'required',
            'issuess_name' => 'required',
        ]);

        $issuess->update($request->all());

        return redirect()->route('issuess.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issuess  $issuess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issuess $issuess)
    {
        $issuess->delete();

        return redirect()->route('issuess.index')
                        ->with('success','Post deleted successfully');
    }
}
