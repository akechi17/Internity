<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use App\Http\Requests\StoreApplianceRequest;
use App\Http\Requests\UpdateApplianceRequest;

class ApplianceController extends Controller
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
     * @param  \App\Http\Requests\StoreApplianceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplianceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appliance  $appliance
     * @return \Illuminate\Http\Response
     */
    public function show(Appliance $appliance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appliance  $appliance
     * @return \Illuminate\Http\Response
     */
    public function edit(Appliance $appliance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplianceRequest  $request
     * @param  \App\Models\Appliance  $appliance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplianceRequest $request, Appliance $appliance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appliance  $appliance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appliance $appliance)
    {
        //
    }
}
