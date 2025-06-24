<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTeachers = User::where('role_id', 2)->count();
        $totalStudents = User::where('role_id', 1)->count();
        $totalClassrooms = Classroom::count();
        $averageRating = Review::avg('rating') ?? 0;
        $totalReviews = Review::count();
        return view('admin.dashboard', compact('totalTeachers', 'totalStudents', 'totalClassrooms', 'averageRating', 'totalReviews'));
    }
} 