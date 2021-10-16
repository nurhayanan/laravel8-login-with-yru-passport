<?php

namespace App\Http\Controllers;

use App\Models\Strategic;
use Illuminate\Http\Request;

class StrategicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Strategic::all();

        return view('strategic.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('strategic.create');
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
            'strategic_name' => 'required',
        ]);

        Strategic::create($request->all());

        return redirect()->route('strategic.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Strategic  $strategic
     * @return \Illuminate\Http\Response
     */
    public function show(Strategic $strategic)
    {
        return view('strategic.show',compact('strategic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Strategic  $strategic
     * @return \Illuminate\Http\Response
     */
    public function edit(Strategic $strategic)
    {
        return view('strategic.edit',compact('strategic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Strategic  $strategic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Strategic $strategic)
    {
        $request->validate([
            'strategic_name' => 'required',
        ]);

        $strategic->update($request->all());

        return redirect()->route('strategic.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Strategic  $strategic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Strategic $strategic)
    {
        $strategic->delete();

        return redirect()->route('strategic.index')
                        ->with('success','Post deleted successfully');
    }
}
