<?php

namespace App\Http\Controllers;

use App\Models\PresenceStatus;
use App\Http\Requests\StorePresenceStatusRequest;
use App\Http\Requests\UpdatePresenceStatusRequest;

class PresenceStatusController extends Controller
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
     * @param  \App\Http\Requests\StorePresenceStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresenceStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PresenceStatus  $presenceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PresenceStatus $presenceStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PresenceStatus  $presenceStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PresenceStatus $presenceStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresenceStatusRequest  $request
     * @param  \App\Models\PresenceStatus  $presenceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresenceStatusRequest $request, PresenceStatus $presenceStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PresenceStatus  $presenceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresenceStatus $presenceStatus)
    {
        //
    }
}
