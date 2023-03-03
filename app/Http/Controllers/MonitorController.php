<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->query('user');
        ! $userId ? abort(400, 'Missing user id') : $userId = decrypt($userId);

        $companyId = $request->query('company');
        ! $companyId ? abort(400, 'Missing company id') : $companyId = decrypt($companyId);

        $monitors = Monitor::where('user_id', $userId)->where('company_id', $companyId)->orderBy('date', 'desc')->paginate(35);

        if ($monitors->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data monitor ditemukan',
                'monitors' => $monitors,
                'pagination' => $monitors->links()->render(),
                'userName' => User::find($userId)->name,
                // 'search' => $search,
                // 'statusData' => $status,
                // 'sort' => $sort,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data monitor tidak ditemukan',
                'monitors' => [],
                'pagination' => $monitors->links()->render(),
                'userName' => User::find($userId)->name,
                // 'search' => $search,
                // 'statusData' => $status,
                // 'sort' => $sort,
            ];
        }

        return view('monitors.index', $context);
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
        //
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
