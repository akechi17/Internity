<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getData($search=null, $status=null, $sort=null)
    {
        $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
        $schools = School::with('code')
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($isAdmin == false, function ($query) {
                return $query->notAdmin(auth()->user()->schools()->first()->id);
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

        $schools->withPath('/schools')->withQueryString();

        if ($schools->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data sekolah ditemukan',
                'schools' => $schools,
                'pagination' => $schools->links()->render(),
                'search' => $search,
                'statusData' => $status,
                'sort' => $sort,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data sekolah tidak ditemukan',
                'schools' => [],
                'pagination' => $schools->links()->render(),
                'search' => $search,
                'statusData' => $status,
                'sort' => $sort,
            ];
        }

        return $context;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $context = $this->getData();

        return $context['status']
            ? view('schools.index', $context)
            : view('schools.index', $context)->with('error', $context['message']);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $status = $request->status;
        $sort = $request->sort;

        $context = $this->getData($search, $status, $sort);

        return $context['status']
            ? response()->json($context)
            : response()->json($context, 204);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
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
            'name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        try {
            $school = School::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            while (true) {
                $code = bin2hex(random_bytes(6/2));
                $codeExist = Code::where('code', $code)->first();
                if ($codeExist) {
                    continue;
                } else {
                    $school->code()->create([
                        'code' => $code,
                    ]);
                    break;
                }
            }

            return redirect()->route('schools.index')->with('success', "Sekolah $school->name berhasil ditambahkan");
        } catch (\Exception $e) {
            return redirect()->route('schools.index')->with('error', 'Terjadi kesalahan saat menambahkan sekolah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        $school = School::with('code')->findOrFail($id);

        return view('schools.show', compact('school'));
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
        $school = School::with('code')->findOrFail($id);

        return view('schools.edit', compact('school'));
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
        $school = School::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'email' => 'email|unique:schools,email,' . $school->id,
            'phone' => 'numeric|unique:schools,phone,' . $school->id,
            'address' => 'string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $school->update([
                'name' => $request->name,
                'status' => $request->status,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $name = $request->name . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/schools');
                $image->move($destinationPath, $name);
                $school->update([
                    'logo' => $name,
                ]);
            }

            return redirect()->route('schools.index')->with('success', "Data sekolah $school->name berhasil diubah");
        } catch (\Exception $e) {
            return redirect()->route('schools.index')->with('error', 'Terjadi kesalahan saat mengubah data sekolah');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        $school = School::findOrFail($id);

        try {
            $school->delete();

            return redirect()->route('schools.index')->with('success', "Data sekolah $school->name berhasil dihapus");
        } catch (\Exception $e) {
            return redirect()->route('schools.index')->with('error', 'Terjadi kesalahan saat menghapus data sekolah');
        }
    }
}
