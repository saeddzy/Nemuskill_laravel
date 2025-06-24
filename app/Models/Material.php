<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'teaching_class_id', 'title', 'type', 'content', 'video_url', 'file_path', 'file_name', 'order'
    ];

    public function teachingClass()
    {
        return $this->belongsTo(TeachingClass::class);
    }
}
