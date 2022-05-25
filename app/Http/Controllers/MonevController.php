<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Http\Requests\StoreMonevRequest;
use App\Http\Requests\UpdateMonevRequest;;
use App\Models\Kompeten;


class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("monev.index");
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
     * @param  \App\Http\Requests\StoreMonevRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonevRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function show(Monev $monev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function edit(Monev $monev)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonevRequest  $request
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonevRequest $request, Monev $monev)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monev $monev)
    {
        //
    }
}
