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

        $monitors->withPath('/monitors?user=' . encrypt($userId) . '&company=' . encrypt($companyId));

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
    public function create(Request $request)
    {
        $userId = $request->query('user');
        ! $userId ? abort(400, 'Missing user id') : $userId = decrypt($userId);

        $companyId = $request->query('company');
        ! $companyId ? abort(400, 'Missing company id') : $companyId = decrypt($companyId);

        $context = [
            'userId' => $userId,
            'companyId' => $companyId,
        ];

        return view('monitors.create', $context);
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
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'date' => 'required|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:10000',
            'notes' => 'nullable|string',
            'suggest' => 'nullable|string',
            'match' => 'required|integer|between:1,4',
        ]);

        $monitor = Monitor::create($request->all());

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = $monitor->id . time() . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/monitors'), $fileName);
            $monitor->update([
                'attachment' => 'storage/monitors/' . $fileName,
            ]);
        }

        return redirect()->route('monitors.index', ['user' => encrypt($request->user_id), 'company' => encrypt($request->company_id)])->with('success', 'Data monitor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        $monitor = Monitor::find($id);

        if ($monitor) {
            $context = [
                'status' => true,
                'message' => 'Data monitor ditemukan',
                'monitor' => $monitor,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data monitor tidak ditemukan',
                'monitor' => [],
            ];
        }

        return view('monitors.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = decrypt($id);
        $monitor = Monitor::find($id);

        if ($monitor) {
            $context = [
                'status' => true,
                'message' => 'Data monitor ditemukan',
                'monitor' => $monitor,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data monitor tidak ditemukan',
                'monitor' => [],
            ];
        }

        return view('monitors.edit', $context);
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
        $id = decrypt($id);
        $request->validate([
            'date' => 'required|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:10000',
            'notes' => 'nullable|string',
            'suggest' => 'nullable|string',
            'match' => 'required|integer|between:1,4',
        ]);

        $monitor = Monitor::find($id);
        $monitor->update($request->all());

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = $monitor->id . time() . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/monitors'), $fileName);
            $monitor->update([
                'attachment' => 'storage/monitors/' . $fileName,
            ]);
        }

        return redirect()->route('monitors.index', ['user' => encrypt($monitor->user_id), 'company' => encrypt($monitor->company_id)])->with('success', 'Data monitor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        $monitor = Monitor::find($id);
        $monitor->delete();

        return redirect()->route('monitors.index', ['user' => encrypt($monitor->user_id), 'company' => encrypt($monitor->company_id)])->with('success', 'Data monitor berhasil dihapus');
    }
}
