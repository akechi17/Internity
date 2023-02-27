<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacancy;
use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        try {
            $appliances = Appliance::where('user_id', $userId)->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting appliances',
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Appliances retrieved successfully',
            'appliances' => $appliances,
        ], 200);
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
        $request->validate([
            'vacancy_id' => 'required|integer|exists:vacancies,id',
        ]);

        try {
            $vacancy = Vacancy::findOrFail($request->vacancy_id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting vacancy',
                'error' => $e->getMessage(),
            ], 500);
        }

        try {
            $userDept = auth()->user()->departments()->first()->id;
            $vacancyDept = $vacancy->company->department->id;

            if (Appliance::where('user_id', auth()->user()->id)->where('vacancy_id', $request->vacancy_id)->exists()) {
                return response()->json([
                    'message' => 'Anda sudah mendaftar pada lowongan ini',
                ], 403);
            }

            if ($userDept != $vacancyDept) {
                return response()->json([
                    'message' => 'Lowongan ini tidak sesuai dengan jurusan anda',
                ], 403);
            }

            if ($vacancy->slots <= $vacancy->applied) {
                return response()->json([
                    'message' => 'Lowongan ini sudah penuh',
                ], 403);
            }

            $appliance = Appliance::create([
                'user_id' => auth()->user()->id,
                'vacancy_id' => $request->vacancy_id,
                'status' => 'pending',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while creating appliance',
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Appliance created successfully',
            'appliance' => $appliance,
        ], 201);
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
            $appliance = Appliance::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting appliance',
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

    public function cancel($id)
    {
        try {
            $appliance = Appliance::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while getting appliance',
                'error' => $e->getMessage(),
            ], 500);
        }

        try {
            $appliance->update([
                'status' => 'canceled',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error while canceling appliance',
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Appliance canceled successfully',
            'appliance' => $appliance,
        ], 200);
    }
}
