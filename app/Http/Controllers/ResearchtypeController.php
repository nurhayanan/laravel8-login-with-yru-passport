<?php

namespace App\Http\Controllers;

use App\Models\Researchtype;
use Illuminate\Http\Request;

class ResearchtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Researchtype::all();

        return view('researchtype.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('researchtype.create');
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
            'research_type' => 'required',
        ]);

        Researchtype::create($request->all());

        return redirect()->route('researchtype.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Researchtype  $researchtype
     * @return \Illuminate\Http\Response
     */
    public function show(Researchtype $researchtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Researchtype  $researchtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Researchtype $researchtype)
    {
        return view('researchtype.edit',compact('researchtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Researchtype  $researchtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Researchtype $researchtype)
    {
        $request->validate([
            'research_type' => 'required',
        ]);

        $researchtype->update($request->all());

        return redirect()->route('researchtype.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Researchtype  $researchtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Researchtype $researchtype)
    {
        $researchtype->delete();

        return redirect()->route('researchtype.index')
                        ->with('success','Post deleted successfully');
    }
}
