<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('student.profile');
    }

    public function edit()
    {
        return view('student.profile-edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'additional_info' => 'nullable|string',
            'last_education' => 'nullable|string|max:255',
            'interests' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete('profile-pictures/' . $user->profile_picture);
            }
            
            // Ensure directory exists
            $directory = storage_path('app/public/profile-pictures');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
            
            // Store new profile picture
            $filename = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->storeAs('public/profile-pictures', $filename);
            $validated['profile_picture'] = $filename;
        }

        $user->update($validated);

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }

    public function deleteProfilePicture()
    {
        $user = Auth::user();
        
        if ($user->profile_picture) {
            Storage::disk('public')->delete('profile-pictures/' . $user->profile_picture);
            $user->update(['profile_picture' => null]);
        }

        return redirect()->route('student.profile.edit')->with('success', 'Profile picture deleted successfully.');
    }
} 