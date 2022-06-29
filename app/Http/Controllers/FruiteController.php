<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFruiteRequest;
use App\Http\Requests\UpdateFruiteRequest;
use App\Models\Fruite;

class FruiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFruiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFruiteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fruite  $fruite
     * @return \Illuminate\Http\Response
     */
    public function show(Fruite $fruite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fruite  $fruite
     * @return \Illuminate\Http\Response
     */
    public function edit(Fruite $fruite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFruiteRequest  $request
     * @param  \App\Models\Fruite  $fruite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFruiteRequest $request, Fruite $fruite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fruite  $fruite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fruite $fruite)
    {
        //
    }
}
