<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = $request->query('company');
        if (! $company) {
            return response()->json([
                'status' => false,
                'message' => 'Company ID is required',
            ], 400);
        }

        try {
            $user = auth()->user();

            $journals = $user->journals()->where('company_id', $company)->whereDate('date', '<=', Carbon::now())->orderBy('date', 'desc')->get();

            return response()->json([
                'status' => true,
                'message' => 'Journals retrieved successfully',
                'journals' => $journals,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error while getting journals',
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
            $journal = auth()->user()->journals()->find($id);

            return response()->json([
                'status' => true,
                'message' => 'Journal retrieved successfully',
                'journal' => $journal,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error while getting journal',
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
        $request->validate([
            'work_type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        try {
            $journal = auth()->user()->journals()->find($id);

            $journal->update([
                'work_type' => $request->work_type,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Journal updated successfully',
                'journal' => $journal,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error while updating journal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $journal = auth()->user()->journals()->find($id);

            $journal->delete();

            return response()->json([
                'status' => true,
                'message' => 'Journal deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error while deleting journal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
