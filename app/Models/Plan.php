<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_name',
        'target_date',
        'notes',
        'status',
        'teaching_class_id',
    ];

    protected $casts = [
        'target_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teachingClass()
    {
        return $this->belongsTo(TeachingClass::class);
    }
} 