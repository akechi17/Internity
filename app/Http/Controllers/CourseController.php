<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function getData($departmentId, $search=null, $sort=null, $paginate=true)
    {
        $courses = Course::where('department_id', $departmentId);
        if ($search) {
            $courses = $courses->search($search);
        }
        if ($sort) {
            if ($sort[0] == '-') {
                $sort = substr($sort, 1);
                $sortType = 'desc';
            } else {
                $sortType = 'asc';
            }
            $courses = $courses->orderBy($sort, $sortType);
        }
        if ($paginate) {
            $courses = $courses->paginate(10);
        } else {
            $courses = $courses->get();
        }

        $paginate ? $courses->withPath('/courses')->withQueryString() : null;

        if ($courses->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data kelas ditemukan',
                'courses' => $courses,
                'pagination' => $paginate ? $courses->links()->render() : null,
                'search' => $search,
                'sort' => $sort,
                'departmentId' => $departmentId,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data kelas tidak ditemukan',
                'courses' => null,
                'pagination' => $paginate ? $courses->links()->render() : null,
                'search' => $search,
                'sort' => $sort,
                'departmentId' => $departmentId,
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
        $departmentId = $request->query('department');
        ! $departmentId ? abort(404) : $departmentId = decrypt($departmentId);

        $search = $request->query('search');
        $sort = $request->query('sort');
        $context = $this->getData($departmentId, $search, $sort);

        return $context['status']
            ? view('courses.index', $context)
            : view('courses.index', $context)->with('error', $context['message']);
    }

    public function search(Request $request)
    {
        $departmentId = $request->query('department');
        ! $departmentId ? abort(404) : $departmentId = decrypt($departmentId);

        $search = $request->query('search');
        $sort = $request->query('sort');
        $context = $this->getData($departmentId, $search, $sort, false);

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
        $departmentId = $request->query('department');
        ! $departmentId ? abort(404) : $departmentId = decrypt($departmentId);

        return view('courses.create', compact('departmentId'));
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
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'status' => 'required|boolean',
            'department_id' => 'required|exists:departments,id',
        ]);

        $course = Course::create($request->all());

        return redirect()->route('courses.index', ['department' => encrypt($course->department_id)])
            ->with('success', 'Kelas berhasil ditambahkan');
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
        try {
            $course = Course::find($id);

            return view('courses.show', compact('course'));
        } catch (\Exception $e) {
            return back()->with('error', 'Kelas tidak ditemukan');
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
        $id = decrypt($id);
        try {
            $course = Course::find($id);

            return view('courses.edit', compact('course'));
        } catch (\Exception $e) {
            return back()->with('error', 'Kelas tidak ditemukan');
        }
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
            'name' => 'required|unique:courses,name,' . $id,
            'description' => 'string|max:255',
            'status' => 'required|boolean',
        ]);

        $course = Course::find($id);
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('courses.index', ['department' => encrypt($course->department_id)])
            ->with('success', 'Kelas berhasil diubah');
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
        try {
            $course = Course::find($id);
            $course->delete();

            return redirect()->route('courses.index', ['department' => encrypt($course->department_id)])
                ->with('success', 'Kelas berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Kelas tidak ditemukan');
        }
    }
}
