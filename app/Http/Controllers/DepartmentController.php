<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    public function getData($schoolId, $search=null, $status=null, $sort=null, $paginate=true)
    {
        $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
        $departments = Department::where('school_id', $schoolId)
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
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
            ->when($paginate, function ($query) use ($paginate){
                return $paginate
                    ? $query->paginate(10)
                    : $query->get();
            });

        $paginate ? $departments->withPath('/departments/'.encrypt($schoolId))->withQueryString() : null;

        $schools = $isAdmin
            ? School::pluck('name', 'id')
            : School::where('id', $schoolId)->pluck('name', 'id');

        if ($departments->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data jurusan ditemukan',
                'departments' => $departments,
                'pagination' => $paginate ? $departments->links()->render() : null,
                'search' => $search,
                'statusData' => $status,
                'sort' => $sort,
                'schools' => $schools,
                'selectedSchool' => $schoolId,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data jurusan tidak ditemukan',
                'departments' => [],
                'pagination' => $paginate ? $departments->links()->render() : null,
                'search' => $search,
                'statusData' => $status,
                'sort' => $sort,
                'schools' => $schools,
                'selectedSchool' => $schoolId,
            ];
        }

        return $context;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoolId = decrypt($request->query('school'));
        ! $schoolId ? abort(404) : null;

        $search = $request->query('search');
        $status = $request->query('status');
        $sort = $request->query('sort');

        $context = $this->getData($schoolId, $search, $status, $sort, true);

        return $context['status']
            ? view('departments.index', $context)
            : view('departments.index', $context)->with('error', $context['message']);
    }

    public function search(Request $request)
    {
        $schoolId = decrypt($request->query('school'));
        ! $schoolId ? abort(404) : null;

        $search = $request->query('search');
        $status = $request->query('status');
        $sort = $request->query('sort');

        $context = $this->getData($schoolId, $search, $status, $sort, false);

        return $context['status']
            ? response()->json($context)
            : response()->json($context, 204);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $schoolId = decrypt($request->query('school'));
        ! $schoolId ? abort(404) : null;

        return view('departments.create', compact('schoolId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'school_id' => 'required|exists:schools,id'
        ]);

        try {
                $department = Department::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status,
                    'school_id' => $request->school_id,
                ]);

                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoName = $department->id . '.' . $logo->getClientOriginalExtension();
                    $destinationPath = storage_path('app/public/departments');
                    $logo->move($destinationPath, $logoName);
                    $department->update([
                        'logo' => $destinationPath . '/' . $logoName,
                    ]);
                }

                return redirect()->route('departments.index', ['school_id' => encrypt($request->school_id)])->with('success', 'Data jurusan berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->route('departments.index', ['school_id' => encrypt($request->school_id)])->with('error', 'Data jurusan gagal ditambahkan');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        try {
            $department = Department::find($id);

            return view('departments.show', compact('department'));
        } catch (\Exception $e) {
            return back()->with('error', 'Data jurusan tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = decrypt($id);
        try {
            $department = Department::find($id);
            $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
            $schools = $isAdmin
                ? School::pluck('name', 'id')
                : School::where('id', auth()->user()->schools()->first()->id)->pluck('name', 'id');

            return view('departments.edit', compact('department', 'schools'));
        } catch (\Exception $e) {
            return back()->with('error', 'Data jurusan tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'school_id' => 'required|exists:schools,id'
        ]);

        try {
            $department = Department::find($id);
            $department->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'school_id' => $request->school_id,
            ]);

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = $department->id . '.' . $logo->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/departments');
                $logo->move($destinationPath, $logoName);
                $department->update([
                    'logo' => $destinationPath . '/' . $logoName,
                ]);
            }

            return redirect()->route('departments.index', ['school_id' => encrypt($request->school_id)])->with('success', 'Data jurusan berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('departments.index', ['school_id' => encrypt($request->school_id)])->with('error', 'Data jurusan gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        try {
            $department = Department::find($id);
            $department->delete();

            return redirect()->route('departments.index', ['school' => encrypt($department->school_id)])->with('success', 'Data jurusan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('departments.index', ['school' => encrypt($department->school_id)])->with('error', 'Data jurusan gagal dihapus');
        }
    }
}
