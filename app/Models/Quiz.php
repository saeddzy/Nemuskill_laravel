<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'teaching_class_id', 'title', 'description', 'passing_score', 'order'
    ];

    public function teachingClass()
    {
        return $this->belongsTo(TeachingClass::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function quizScores()
    {
        return $this->hasMany(QuizScore::class);
    }

    public function scores()
    {
        return $this->hasMany(QuizScore::class);
    }
}
