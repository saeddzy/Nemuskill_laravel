<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function download($classId, $materialId)
    {
        $material = Material::findOrFail($materialId);
        if (!$material->file_path) {
            abort(404);
        }
        return Storage::disk('public')->download($material->file_path, $material->file_name);
    }
} 