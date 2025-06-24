<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teaching_class_id',
        'proof_image',
        'status', // pending, approved, rejected
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teachingClass()
    {
        return $this->belongsTo(TeachingClass::class);
    }
} 