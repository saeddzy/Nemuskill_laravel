<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassPurchase;

class InvoiceController extends Controller
{
    public function index()
    {
        $purchases = ClassPurchase::with('teachingClass')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('student.invoice', compact('purchases'));
    }
} 