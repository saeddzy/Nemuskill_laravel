<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingClass;
use App\Models\ClassPurchase;

class FindClassController extends Controller
{
    public function index()
    {
        $classes = TeachingClass::all();
        return view('student.findclass', compact('classes'));
    }

    public function show(TeachingClass $class)
    {
        return view('student.findclass-show', compact('class'));
    }

    public function purchase(Request $request, TeachingClass $class)
    {
        $request->validate([
            'proof_image' => 'required|image|max:2048',
        ]);
        $purchase = ClassPurchase::create([
            'user_id' => auth()->id(),
            'teaching_class_id' => $class->id,
            'proof_image' => $request->file('proof_image')->store('proof-images', 'public'),
            'status' => 'pending',
        ]);
        return redirect()->route('student.findclass.show', $class)->with('success', 'Bukti pembayaran berhasil diupload, menunggu verifikasi admin.');
    }
} 