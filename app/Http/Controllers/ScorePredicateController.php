<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\ScorePredicate;
use App\Http\Requests\StoreScorePredicateRequest;
use App\Http\Requests\UpdateScorePredicateRequest;

class ScorePredicateController extends Controller
{
    public function getData($schoolId, $search=null, $sort=null)
    {
        $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
        $scorePredicates = ScorePredicate::whereHas('school', function ($query) use ($schoolId, $isAdmin) {
            return $isAdmin
            ? $query->where('id', $schoolId)
            : $query->where('id', auth()->user()->schools()->first()->id);
            })
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

        $scorePredicates->withPath('/score-predicates')->withQueryString();

        if ($scorePredicates->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data predikat nilai ditemukan',
                'scorePredicates' => $scorePredicates,
                'pagination' => $scorePredicates->links()->render(),
                'search' => $search,
                'sort' => $sort,
            ];
        } else {
            $context = [
                'status' => false,
                'message' => 'Data predikat nilai tidak ditemukan',
                'scorePredicates' => [],
                'pagination' => $scorePredicates->links()->render(),
                'search' => $search,
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
        $schoolId = decrypt($request->query('school'));
        $context = $this->getData($schoolId);

        return view('score-predicates.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isAdmin = auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin');
        $schools = $isAdmin
            ? School::pluck('name', 'id')
            : auth()->user()->schools()->first()->pluck('name', 'id');
        return view('score-predicates.create', compact('schools'));
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
            'school_id' => 'required|exists:schools,id',
            'name' => 'required',
            'description' => 'string|max:255',
            'color' => 'required',
            'min' => 'required',
            'max' => 'required',
        ]);

        $scorePredicate = ScorePredicate::create($request->all());

        return redirect()->route('score-predicates.index', ['school' => encrypt($scorePredicate->school_id)])->with('success', 'Predikat nilai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  $schoolId
     * @return \Illuminate\Http\Response
     */
    public function show($schoolId)
    {
        $schoolId = decrypt($schoolId);
        $context = $this->getData($schoolId);

        return view('score-predicates.index', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = decrypt($id);
        $scorePredicate = ScorePredicate::findOrFail($id);
        return view('score-predicates.edit', compact('scorePredicate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'string|max:255',
            'color' => 'required',
            'min' => 'required',
            'max' => 'required',
        ]);

        try {
            $scorePredicate = ScorePredicate::find($id);
            $scorePredicate->update($request->all());
            return redirect()->route('score-predicates.index', ['show' => encrypt($scorePredicate->school_id)])->with('success', 'Predikat nilai berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Predikat nilai gagal diperbarui');
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
        $id = decrypt($id);
        try {
            $scorePredicate = ScorePredicate::find($id);
            $scorePredicate->delete();
            return redirect()->route('score-predicates.index', ['show' => encrypt($scorePredicate->school_id)])->with('success', 'Predikat nilai berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Predikat nilai gagal dihapus');
        }
    }
}
