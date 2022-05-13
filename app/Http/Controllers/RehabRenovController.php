<?php

namespace App\Http\Controllers;

use App\Models\RehabRenov;
use App\Http\Requests\StoreRehabRenovRequest;
use App\Http\Requests\UpdateRehabRenovRequest;

class RehabRenovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("bangunan.rehabrenov.index");
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
     * @param  \App\Http\Requests\StoreRehabRenovRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRehabRenovRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function show(RehabRenov $rehabRenov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function edit(RehabRenov $rehabRenov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRehabRenovRequest  $request
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRehabRenovRequest $request, RehabRenov $rehabRenov)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RehabRenov  $rehabRenov
     * @return \Illuminate\Http\Response
     */
    public function destroy(RehabRenov $rehabRenov)
    {
        //
    }
}
