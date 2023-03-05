<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PresenceStatus;
use App\Http\Controllers\Controller;

class PresenceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        try {
            $presenceStatuses = PresenceStatus::where('school_id', $user->schools()->first()->id)->get();

            return response()->json([
                'message' => 'Presence statuses retrieved successfully',
                'presence_statuses' => $presenceStatuses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting presence statuses',
                'error' => $e->getMessage(),
            ], 500);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $presenceStatus = PresenceStatus::findOrFail($id);

            return response()->json([
                'message' => 'Presence status retrieved successfully',
                'presence_status' => $presenceStatus,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting presence status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
