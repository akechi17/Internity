<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;

class JournalController extends Controller
{
    public function getData($userId, $search=null, $status=null, $sort=null, $paginate=true)
    {
        $journals = Journal::where('user_id', $userId);
        if ($search) {
            $journals = $journals->search($search);
        }
        if ($status) {
            $journals = $journals->where('status', $status);
        }
        if ($sort) {
            if ($sort[0] == '-') {
                $sort = substr($sort, 1);
                $sortType = 'desc';
            } else {
                $sortType = 'asc';
            }
            $journals = $journals->orderBy($sort, $sortType);
        }
        if ($paginate) {
            $journals = $journals->paginate(10);
            $journals->withPath('/journals')->withQueryString();
        } else {
            $journals = $journals->get();
        }

        if ($journals->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data jurnal ditemukan',
                'journals' => $journals,
                'pagination' => $journals->links()->render(),
                'search' => $search,
                'statusData' => $status,
                'sort' => $sort,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data jurnal tidak ditemukan',
                'journals' => [],
                'pagination' => $journals->links()->render(),
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
    public function index(Request $request)
    {
        $userId = $request->query('user');
        ! $userId ? abort(404) : $userId = decrypt($userId);

        $search = $request->query('search');
        $status = $request->query('status');
        $sort = $request->query('sort');

        $context = $this->getData($userId, $search, $status, $sort);
        return view('journals.index', $context);
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
     * @param  \App\Http\Requests\StoreJournalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJournalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJournalRequest  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
