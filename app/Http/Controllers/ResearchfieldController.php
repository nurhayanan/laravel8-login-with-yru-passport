<?php

namespace App\Http\Controllers;

use App\Models\Researchfield;
use Illuminate\Http\Request;

class ResearchfieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Researchfield::all();

        return view('researchfield.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('researchfield.create');
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
            'research_field' => 'required',
        ]);

        Researchfield::create($request->all());

        return redirect()->route('researchfield.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Researchfield  $researchfield
     * @return \Illuminate\Http\Response
     */
    public function show(Researchfield $researchfield)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Researchfield  $researchfield
     * @return \Illuminate\Http\Response
     */
    public function edit(Researchfield $researchfield)
    {
        return view('researchfield.edit',compact('researchfield'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Researchfield  $researchfield
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Researchfield $researchfield)
    {
        $request->validate([
            'research_field' => 'required',
        ]);

        $researchfield->update($request->all());

        return redirect()->route('researchfield.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Researchfield  $researchfield
     * @return \Illuminate\Http\Response
     */
    public function destroy(Researchfield $researchfield)
    {
        $researchfield->delete();

        return redirect()->route('researchfield.index')
                        ->with('success','Post deleted successfully');
    }
}
