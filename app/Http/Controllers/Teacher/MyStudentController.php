<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeachingClass;
use Illuminate\Support\Facades\Auth;

class MyStudentController extends Controller
{
    public function index()
    {
        $classes = TeachingClass::where('user_id', Auth::id())->withCount(['purchases'])->get();
        return view('teacher.my-student.index', compact('classes'));
    }

    public function show($id)
    {
        $class = TeachingClass::with(['purchases.student', 'quizzes.quizScores' => function($q) { $q->with('student'); }])->where('user_id', Auth::id())->findOrFail($id);
        return view('teacher.my-student.show', compact('class'));
    }
} 