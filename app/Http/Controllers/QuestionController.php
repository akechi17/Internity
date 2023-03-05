<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoolId = $request->query('school');
        ! $schoolId ? abort(404) : $schoolId = decrypt($schoolId);

        $questions = Question::where('school_id', $schoolId)->orderBy('order')->paginate(10);
        $questions->withPath('/questions?school=' . encrypt($schoolId));

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $schoolId = $request->query('school');
        ! $schoolId ? abort(404) : $schoolId = $schoolId;

        return view('questions.create', compact('schoolId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'order' => 'required|integer',
            'school_id' => 'required|exists:schools,id',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index', ['school' => encrypt($request->school_id)]);
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
        $question = Question::findOrFail($id);

        return view('questions.show', compact('question'));
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
        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question'));
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
            'question' => 'required',
            'order' => 'required|integer',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions.index', ['school' => encrypt($question->school_id)]);
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
        $question = Question::findOrFail($id);
        $question->delete();

        return back()->with('success', 'Question deleted successfully');
    }
}
