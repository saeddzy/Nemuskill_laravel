<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingClass;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizOption;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeachingClass $myteaching, Quiz $quiz)
    {
        $questions = $quiz->questions()->with('options')->orderBy('order')->get();
        return view('teacher.quiz_questions.index', compact('myteaching', 'quiz', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeachingClass $myteaching, Quiz $quiz)
    {
        return view('teacher.quiz_questions.create', compact('myteaching', 'quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TeachingClass $myteaching, Quiz $quiz)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'order' => 'nullable|integer',
            'weight' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'options.*.option_text' => 'required|string',
            'correct_option' => 'required|integer',
        ]);
        $question = $quiz->questions()->create([
            'question' => $validated['question'],
            'order' => $validated['order'] ?? 0,
            'weight' => $validated['weight'],
        ]);
        foreach ($validated['options'] as $idx => $opt) {
            $question->options()->create([
                'option_text' => $opt['option_text'],
                'is_correct' => $idx == $validated['correct_option'],
                'order' => $idx,
            ]);
        }
        return redirect()->route('teacher.myteaching.quizzes.questions.index', [$myteaching, $quiz])
            ->with('success', 'Soal berhasil ditambahkan!');
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
    public function edit(TeachingClass $myteaching, Quiz $quiz, QuizQuestion $question)
    {
        return view('teacher.quiz_questions.edit', compact('myteaching', 'quiz', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingClass $myteaching, Quiz $quiz, QuizQuestion $question)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'order' => 'nullable|integer',
            'weight' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'options.*.option_text' => 'required|string',
            'correct_option' => 'required|integer',
        ]);

        // Update the question
        $question->update([
            'question' => $validated['question'],
            'order' => $validated['order'] ?? 0,
            'weight' => $validated['weight'],
        ]);

        // Delete existing options
        $question->options()->delete();

        // Create new options
        foreach ($validated['options'] as $idx => $opt) {
            $question->options()->create([
                'option_text' => $opt['option_text'],
                'is_correct' => $idx == $validated['correct_option'],
                'order' => $idx,
            ]);
        }

        return redirect()->route('teacher.myteaching.quizzes.questions.index', [$myteaching, $quiz])
            ->with('success', 'Soal berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingClass $myteaching, Quiz $quiz, QuizQuestion $question)
    {
        $question->delete();
        return redirect()->route('teacher.myteaching.quizzes.questions.index', [$myteaching, $quiz])
            ->with('success', 'Soal berhasil dihapus!');
    }
}
