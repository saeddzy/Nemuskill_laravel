<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view('teacher.homepage');
    }
} 