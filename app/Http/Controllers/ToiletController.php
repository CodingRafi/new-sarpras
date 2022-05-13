<?php

namespace App\Http\Controllers;

use App\Models\Toilet;
use App\Http\Requests\StoreToiletRequest;
use App\Http\Requests\UpdateToiletRequest;

class ToiletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("bangunan.toilet.index");
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
     * @param  \App\Http\Requests\StoreToiletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToiletRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function show(Toilet $toilet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function edit(Toilet $toilet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToiletRequest  $request
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToiletRequest $request, Toilet $toilet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toilet  $toilet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toilet $toilet)
    {
        //
    }
}
