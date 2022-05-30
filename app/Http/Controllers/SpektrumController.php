<?php

namespace App\Http\Controllers;

use App\Models\Spektrum;
use App\Http\Requests\StoreSpektrumRequest;
use App\Http\Requests\UpdateSpektrumRequest;

class SpektrumController extends Controller
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
     * @param  \App\Http\Requests\StoreSpektrumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpektrumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function show(Spektrum $spektrum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function edit(Spektrum $spektrum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpektrumRequest  $request
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpektrumRequest $request, Spektrum $spektrum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spektrum  $spektrum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spektrum $spektrum)
    {
        //
    }
}
