<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresenceStatus;
use App\Http\Requests\StorePresenceStatusRequest;
use App\Http\Requests\UpdatePresenceStatusRequest;

class PresenceStatusController extends Controller
{
    private function getData($schoolId, $search=null, $sort=null)
    {
        $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
        $schoolId = $isAdmin
            ? $schoolId
            : auth()->user()->schools()->first()->id;

        $presenceStatuses = PresenceStatus::where('school_id', $schoolId)
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->when($sort, function ($query, $sort) {
                if ($sort[0] == '-') {
                    $sort = substr($sort, 1);
                    $sortType = 'desc';
                } else {
                    $sortType = 'asc';
                }
                return $query->orderBy($sort, $sortType);
            })
            ->paginate(10);

        $presenceStatuses->withPath('/presence-statuses')->withQueryString();

        if ($presenceStatuses->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data status kehadiran ditemukan',
                'presenceStatuses' => $presenceStatuses,
                'pagination' => $presenceStatuses->links()->render(),
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data status kehadiran tidak ditemukan',
                'presenceStatuses' => $presenceStatuses,
            ];
        }

        return $context;
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoolId = $request->query('school');
        ! $schoolId ? abort(404) : $schoolId = decrypt($schoolId);

        $search = $request->query('search');
        $sort = $request->query('sort');

        $context = $this->getData($schoolId, $search, $sort);

        return view('presence-statuses.index', $context);
    }

    public function search(Request $request)
    {
        $schoolId = $request->query('school');
        ! $schoolId ? abort(404) : $schoolId = decrypt($schoolId);

        $search = $request->query('search');
        $sort = $request->query('sort');

        $context = $this->getData($search, $sort);

        return $context['status']
            ? response()->json($context, 200)
            : response()->json($context, 204);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $schoolId = $request->query('school');
        ! $schoolId ? abort(404) : $schoolId = decrypt($schoolId);

        return view('presence-statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
        ]);

        $presenceStatus = PresenceStatus::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect('presence-statuses.index')->with('success', 'Data status kehadiran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presenceStatus = PresenceStatus::find($id);

        if ($presenceStatus) {
            $context = [
                'status' => true,
                'message' => 'Data status kehadiran ditemukan',
                'presenceStatus' => $presenceStatus,
            ];

            return view('presence-statuses.show', $context);
        } else {
            return redirect('presence-statuses.index')->with('error', 'Data status kehadiran tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presenceStatus = PresenceStatus::find($id);

        if ($presenceStatus) {
            $context = [
                'status' => true,
                'message' => 'Data status kehadiran ditemukan',
                'presenceStatus' => $presenceStatus,
            ];

            return view('presence-statuses.edit', $context);
        } else {
            return redirect('presence-statuses.index')->with('error', 'Data status kehadiran tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $presenceStatus = PresenceStatus::find($id);

        if ($presenceStatus) {
            $this->validate($request, [
                'name' => 'required',
                'color' => 'required',
            ]);

            $presenceStatus->name = $request->name;
            $presenceStatus->color = $request->color;
            $presenceStatus->save();

            return redirect('presence-statuses.index')->with('success', 'Data status kehadiran berhasil diubah');
        } else {
            return redirect('presence-statuses.index')->with('error', 'Data status kehadiran tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenceStatus = PresenceStatus::find($id);

        if ($presenceStatus) {
            $presenceStatus->delete();

            return redirect('presence-statuses.index')->with('success', 'Data status kehadiran berhasil dihapus');
        } else {
            return redirect('presence-statuses.index')->with('error', 'Data status kehadiran tidak ditemukan');
        }
    }
}
