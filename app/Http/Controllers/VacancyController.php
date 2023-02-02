<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;

class VacancyController extends Controller
{
    private function getData($company, $search, $sort)
    {
        $vacancies = Vacancy::query()
            ->company($company)
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

        $vacancies->withPath('/vacancies')->withQueryString();

        if ($vacancies->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data lowongan ditemukan',
                'vacancies' => $vacancies,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data lowongan tidak ditemukan',
                'vacancies' => $vacancies,
            ];
        }

        return $context;
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = decrypt($request->query('company'));
        $search = $request->query('search');
        $sort = $request->query('sort');

        $context = $this->getData($company, $search, $sort);

        return view('vacancies.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVacancyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVacancyRequest  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
