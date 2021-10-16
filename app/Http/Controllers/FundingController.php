<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use Illuminate\Http\Request;

class FundingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Funding::all();

        return view('funding.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funding.create');
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
            'funding_name' => 'required',
        ]);

        Funding::create($request->all());

        return redirect()->route('funding.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function show(Funding $funding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function edit(Funding $funding)
    {
        return view('funding.edit',compact('funding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funding $funding)
    {
        $request->validate([
            'funding_name' => 'required',
        ]);

        $funding->update($request->all());

        return redirect()->route('funding.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funding $funding)
    {
        $funding->delete();

        return redirect()->route('funding.index')
                        ->with('success','Post deleted successfully');
    }
}
