<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('teacher.profile');
    }
} 