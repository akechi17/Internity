<?php

namespace App\Http\Controllers;

use App\Models\ScorePredicate;
use App\Http\Requests\StoreScorePredicateRequest;
use App\Http\Requests\UpdateScorePredicateRequest;

class ScorePredicateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreScorePredicateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScorePredicateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScorePredicate  $scorePredicate
     * @return \Illuminate\Http\Response
     */
    public function show(ScorePredicate $scorePredicate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScorePredicate  $scorePredicate
     * @return \Illuminate\Http\Response
     */
    public function edit(ScorePredicate $scorePredicate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScorePredicateRequest  $request
     * @param  \App\Models\ScorePredicate  $scorePredicate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScorePredicateRequest $request, ScorePredicate $scorePredicate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScorePredicate  $scorePredicate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScorePredicate $scorePredicate)
    {
        //
    }
}
