<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingClass;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeachingClass $myteaching)
    {
        $quizzes = $myteaching->quizzes()->orderBy('order')->get();
        return view('teacher.quizzes.index', compact('myteaching', 'quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeachingClass $myteaching)
    {
        return view('teacher.quizzes.create', compact('myteaching'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TeachingClass $myteaching)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passing_score' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
        ]);
        $validated['teaching_class_id'] = $myteaching->id;
        $quiz = \App\Models\Quiz::create($validated);
        return redirect()->route('teacher.myteaching.quizzes.index', $myteaching)
            ->with('success', 'Quiz berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingClass $myteaching, Quiz $quiz)
    {
        return view('teacher.quizzes.edit', compact('myteaching', 'quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingClass $myteaching, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passing_score' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
        ]);
        $quiz->update($validated);
        return redirect()->route('teacher.myteaching.quizzes.index', $myteaching)
            ->with('success', 'Quiz berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingClass $myteaching, Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('teacher.myteaching.quizzes.index', $myteaching)
            ->with('success', 'Quiz berhasil dihapus!');
    }
}
