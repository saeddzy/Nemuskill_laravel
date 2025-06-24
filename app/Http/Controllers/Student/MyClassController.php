<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassPurchase;
use App\Models\TeachingClass;
use App\Models\Quiz;
use App\Models\QuizScore;
use Illuminate\Support\Facades\Log;

class MyClassController extends Controller
{
    public function index()
    {
        $purchases = ClassPurchase::with('teachingClass')
            ->where('user_id', auth()->id())
            ->where('status', 'approved')
            ->latest()
            ->get();
        return view('student.myclass', compact('purchases'));
    }

    public function materials(TeachingClass $currentClass)
    {
        Log::info('Attempting to access materials for class', ['user_id' => auth()->id(), 'class_id' => $currentClass->id]);

        $purchase = ClassPurchase::where('user_id', auth()->id())
            ->where('teaching_class_id', $currentClass->id)
            ->where('status', 'approved')
            ->first();
        
        // TEMPORARY BYPASS FOR DEBUGGING: DO NOT USE IN PRODUCTION
        // This line is commented out to allow access to materials regardless of purchase status.
        // if (!$purchase) {
        //     Log::warning('Class purchase not found or not approved', ['user_id' => auth()->id(), 'class_id' => $currentClass->id]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Anda tidak memiliki akses ke materi kelas ini.'
        //     ], 403);
        // }

        Log::info('Class purchase found', ['purchase' => $purchase ? $purchase->toArray() : 'Bypassed']);

        $materials = $currentClass->materials()
            ->orderBy('order')
            ->get();

        Log::info('Materials fetched for class', ['class_id' => $currentClass->id, 'materials_count' => $materials->count()]);

        return view('student.materials.index', compact('currentClass', 'materials'));
    }

    public function listMaterials(TeachingClass $class)
    {
        Log::info('API: Attempting to access materials for class', ['user_id' => auth()->id(), 'class_id' => $class->id]);

        $purchase = ClassPurchase::where('user_id', auth()->id())
            ->where('teaching_class_id', $class->id)
            ->where('status', 'approved')
            ->first();
        
        if (!$purchase) {
            Log::warning('API: Class purchase not found or not approved', ['user_id' => auth()->id(), 'class_id' => $class->id]);
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki akses ke materi kelas ini.'
            ], 403);
        }

        Log::info('API: Class purchase found', ['purchase' => $purchase->toArray()]);

        $materials = $class->materials()
            ->orderBy('order')
            ->get();

        Log::info('API: Materials fetched for class', ['class_id' => $class->id, 'materials_count' => $materials->count()]);

        return response()->json([
            'status' => 'success',
            'data' => [
                'class' => $class,
                'materials' => $materials
            ]
        ]);
    }

    public function quizzes(TeachingClass $class)
    {
        $purchase = ClassPurchase::where('user_id', auth()->id())
            ->where('teaching_class_id', $class->id)
            ->where('status', 'approved')
            ->first();
        if (!$purchase) {
            abort(403, 'Anda tidak memiliki akses ke quiz kelas ini.');
        }
        $quizzes = $class->quizzes()->with(['scores' => function($query) {
            $query->where('user_id', auth()->id());
        }])->orderBy('order')->get();
        return view('student.quizzes.index', compact('class', 'quizzes'));
    }

    public function doQuiz(TeachingClass $class, Quiz $quiz)
    {
        $purchase = ClassPurchase::where('user_id', auth()->id())
            ->where('teaching_class_id', $class->id)
            ->where('status', 'approved')
            ->first();
        if (!$purchase) {
            abort(403, 'Anda tidak memiliki akses ke quiz kelas ini.');
        }

        // Check if student has already taken the quiz 3 times
        $attemptCount = QuizScore::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->count();

        if ($attemptCount >= 3) {
            return redirect()->route('student.myclass.quizzes', $class)
                ->with('error', 'Anda sudah mencapai batas maksimal 3 kali percobaan untuk quiz ini.');
        }

        $questions = $quiz->questions()->with('options')->orderBy('order')->get();
        return view('student.quizzes.do', compact('class', 'quiz', 'questions'));
    }

    public function submitQuiz(Request $request, TeachingClass $class, Quiz $quiz)
    {
        $purchase = ClassPurchase::where('user_id', auth()->id())
            ->where('teaching_class_id', $class->id)
            ->where('status', 'approved')
            ->first();
        if (!$purchase) {
            abort(403, 'Anda tidak memiliki akses ke quiz kelas ini.');
        }

        // Check if student has already taken the quiz 3 times
        $attemptCount = QuizScore::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->count();

        if ($attemptCount >= 3) {
            return redirect()->route('student.myclass.quizzes', $class)
                ->with('error', 'Anda sudah mencapai batas maksimal 3 kali percobaan untuk quiz ini.');
        }

        $questions = $quiz->questions()->with('options')->get();
        $totalQuestions = $questions->count();
        $score = 0;
        $answers = [];

        foreach ($questions as $question) {
            $answer = $request->input('answers.' . $question->id);
            $answers[$question->id] = $answer;

            // Check if the answer is correct
            $correctOption = $question->options()->where('is_correct', true)->first();
            if ($correctOption && $answer == $correctOption->id) {
                $score++;
            }
        }

        // Calculate percentage score
        $percentageScore = ($score / $totalQuestions) * 100;

        // Store the quiz score
        QuizScore::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $percentageScore,
            'total_questions' => $totalQuestions,
            'answers' => $answers
        ]);

        return redirect()->route('student.myclass.quizzes', $class)
            ->with('success', 'Quiz berhasil diselesaikan!');
    }

    public function listClasses()
    {
        $purchases = ClassPurchase::with(['teachingClass' => function($query) {
            $query->with(['teacher', 'category']);
        }])
        ->where('user_id', auth()->id())
        ->where('status', 'approved')
        ->latest()
        ->get()
        ->map(function($purchase) {
            if (!$purchase->teachingClass) {
                return null;
            }

            return [
                'id' => $purchase->teachingClass->id,
                'title' => $purchase->teachingClass->title,
                'description' => $purchase->teachingClass->description,
                'thumbnail' => $purchase->teachingClass->thumbnail,
                'price' => $purchase->teachingClass->price,
                'teacher' => $purchase->teachingClass->teacher ? [
                    'id' => $purchase->teachingClass->teacher->id,
                    'name' => $purchase->teachingClass->teacher->name,
                ] : null,
                'category' => $purchase->teachingClass->category ? [
                    'id' => $purchase->teachingClass->category->id,
                    'name' => $purchase->teachingClass->category->name,
                ] : null,
                'purchase_date' => $purchase->created_at,
                'status' => $purchase->status,
            ];
        })
        ->filter() // Remove null values
        ->values(); // Re-index array

        return response()->json([
            'status' => 'success',
            'data' => $purchases
        ]);
    }
} 