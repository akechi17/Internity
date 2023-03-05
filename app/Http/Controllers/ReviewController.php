<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Company;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function companyIndex(Request $request)
    {
        $companyId = $request->query('company');
        ! $companyId ? abort(404) : $companyId = decrypt($companyId);
        $reviews = Review::where('reviewable_id', $companyId)
            ->where('reviewable_type', 'App\Models\Company')
            ->with('user')
            ->paginate(10);

        $reviews->withPath(route('reviews.companies.index', ['company' => encrypt($companyId)]));

        $companyName = Company::where('id', $companyId)->first('name')->name;
        return view('reviews.companies.index', compact('reviews', 'companyName'));
    }

    public function userEdit(Request $request)
    {
        $userId = $request->query('user');
        ! $userId ? abort(404) : $userId = decrypt($userId);
        $companyId = $request->query('company');
        ! $companyId ? abort(404) : $companyId = decrypt($companyId);

        $user = User::find($userId);

        $reviews = Review::where('reviewable_id', $userId)
            ->where('reviewable_type', 'App\Models\User')
            ->where('company_id', $companyId)
            ->get();

        if ( $reviews->isEmpty() ) {
            $questions = Question::where('school_id', $user->schools()->first()->id)->orderBy('order')->get();

            foreach ( $questions as $question ) {
                Review::create([
                    'company_id' => $companyId,
                    'reviewable_id' => $userId,
                    'reviewable_type' => 'App\Models\User',
                    'title' => $question->question,
                    'rating' => 5,
                ]);
            }

            $reviews = Review::where('reviewable_id', $userId)
                ->where('reviewable_type', 'App\Models\User')
                ->where('company_id', $companyId)
                ->get();
        }

        return view('reviews.users.edit', compact('reviews', 'user'));
    }

    public function userUpdate(Request $request)
    {
        dd($request->all());
        $request->validate([
            'reviews' => 'required|array',
            'reviews.*.id' => 'required|exists:reviews,id',
            'reviews.*.rating' => 'required|numeric|min:1|max:5',
            'reviews.*.body' => 'nullable|string',
        ]);

        foreach ( $request->reviews as $review ) {
            Review::find($review['id'])->update([
                'rating' => $review['rating'],
                'body' => $review['body'],
            ]);
        }

        return back()->with('success', 'Review updated successfully');
    }
}
