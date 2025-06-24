<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingClass;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeachingClass $myteaching)
    {
        $materials = $myteaching->materials()->orderBy('order')->get();
        return view('teacher.materials.index', compact('myteaching', 'materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeachingClass $myteaching)
    {
        return view('teacher.materials.create', compact('myteaching'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TeachingClass $myteaching)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,video,file',
            'content' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:10240', // Max 10MB
            'order' => 'nullable|integer',
        ]);

        $validated['teaching_class_id'] = $myteaching->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validated['file_name'] = $file->getClientOriginalName();
            $validated['file_path'] = $file->store('materials', 'public');
        }

        $material = Material::create($validated);

        return redirect()->route('teacher.myteaching.materials.index', $myteaching)
            ->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingClass $myteaching, Material $material)
    {
        return view('teacher.materials.edit', compact('myteaching', 'material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingClass $myteaching, Material $material)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,video,file',
            'content' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:10240', // Max 10MB
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($material->file_path) {
                Storage::disk('public')->delete($material->file_path);
            }
            
            $file = $request->file('file');
            $validated['file_name'] = $file->getClientOriginalName();
            $validated['file_path'] = $file->store('materials', 'public');
        }

        $material->update($validated);

        return redirect()->route('teacher.myteaching.materials.index', $myteaching)
            ->with('success', 'Materi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingClass $myteaching, Material $material)
    {
        // Delete file if exists
        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }
        
        $material->delete();
        
        return redirect()->route('teacher.myteaching.materials.index', $myteaching)
            ->with('success', 'Materi berhasil dihapus!');
    }

    public function download(TeachingClass $myteaching, Material $material)
    {
        if (!$material->file_path) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $material->file_path,
            $material->file_name
        );
    }
}
