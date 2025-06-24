<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role_id', 2)->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'name' => 'required|string|max:255',
        ]);
        $validated['role_id'] = 2;
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added successfully!');
    }

    public function edit(User $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, User $teacher)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6',
        ]);
        if ($validated['password']) {
            $teacher->password = Hash::make($validated['password']);
        }
        $teacher->email = $validated['email'];
        $teacher->name = $validated['name'];
        $teacher->save();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully!');
    }
} 