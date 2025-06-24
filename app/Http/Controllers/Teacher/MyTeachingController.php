<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeachingController extends Controller
{
    public function index()
    {
        $classes = TeachingClass::where('user_id', Auth::id())->get();
        return view('teacher.myteaching.index', compact('classes'));
    }

    public function create()
    {
        return view('teacher.myteaching.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);
        $validated['user_id'] = Auth::id();
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('class-thumbnails', 'public');
        }
        TeachingClass::create($validated);
        return redirect()->route('teacher.myteaching.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit(TeachingClass $myteaching)
    {
        $this->authorize('update', $myteaching);
        return view('teacher.myteaching.edit', ['class' => $myteaching]);
    }

    public function update(Request $request, TeachingClass $myteaching)
    {
        $this->authorize('update', $myteaching);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('class-thumbnails', 'public');
        }
        $myteaching->update($validated);
        return redirect()->route('teacher.myteaching.index')->with('success', 'Kelas berhasil diupdate!');
    }

    public function destroy(TeachingClass $myteaching)
    {
        $this->authorize('delete', $myteaching);
        $myteaching->delete();
        return redirect()->route('teacher.myteaching.index')->with('success', 'Kelas berhasil dihapus!');
    }
} 