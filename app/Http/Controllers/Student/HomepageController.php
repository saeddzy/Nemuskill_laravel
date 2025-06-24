<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\TeachingClass;
use App\Models\ClassPurchase;

class HomepageController extends Controller
{
    public function index()
    {
        // Get user's plans
        $plans = auth()->user()->plans()
            ->where('status', '!=', 'completed')
            ->latest()
            ->take(3)
            ->get();

        // Get recommended classes (classes not purchased by the user)
        $purchasedClassIds = ClassPurchase::where('user_id', auth()->id())
            ->where('status', 'approved')
            ->pluck('teaching_class_id');

        $recommendedClasses = TeachingClass::whereNotIn('id', $purchasedClassIds)
            ->latest()
            ->take(4)
            ->get();

        return view('student.homepage', compact('plans', 'recommendedClasses'));
    }
} 