<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeachingClass;
use Illuminate\Http\Request;

class TeachingClassController extends Controller
{
    public function index()
    {
        $classes = TeachingClass::with('teacher')->get();
        return view('admin.teaching-classes.index', compact('classes'));
    }

    public function show($id)
    {
        $class = TeachingClass::with(['teacher', 'purchases.student'])->findOrFail($id);
        return view('admin.teaching-classes.show', compact('class'));
    }

    public function destroy(TeachingClass $teaching_class)
    {
        $teaching_class->delete();
        return redirect()->route('admin.teaching-classes.index')->with('success', 'Kelas berhasil dihapus!');
    }
} 