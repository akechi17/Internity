<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getData($search=null, $status=null, $school=null, $department=null, $sort=null)
    {
        $isManager = auth()->user()->hasRole('manager');
        $isTeacher = auth()->user()->hasRole('teacher');

        $users = User::when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($school, function ($query, $school) {
                return $query->whereHas('schools', function($query) use ($school) {
                    $query->where('school_id', $school);
                });
            })
            ->when($department, function ($query, $department) {
                return $query->whereHas('departments', function($query) use ($department) {
                    $query->where('department_id', $department);
                });
            })
            ->when($isManager, function ($query) {
                return $query->manager(auth()->user()->schools()->first()->id);
            })
            ->when($isTeacher, function ($query) {
                return $query->teacher(auth()->user()->departments()->first()->id);
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

        if ($users->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data user ditemukan',
                'students' => $users,
                'pagination' => $users->links()->render(),
                'search' => $search,
                'statusData' => $status,
                'school' => $school,
                'department' => $department,
                'sort' => $sort,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data user tidak ditemukan',
                'students' => [],
                'pagination' => $users->links()->render(),
                'search' => $search,
                'statusData' => $status,
                'school' => $school,
                'department' => $department,
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
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $school = $request->query('school');
        $department = $request->query('department');
        $sort = $request->query('sort');

        $context = $this->getData($search, $status, $school, $department, $sort);

        return $context['status']
        ? view('students.index', $context)
        : view('students.index', $context)->with('error', $context['message']);
    }
}
