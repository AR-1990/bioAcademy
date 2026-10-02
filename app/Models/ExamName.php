<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamName extends Model
{
    use HasFactory;
    protected $fillable=['QuizName','NoOfQuestions','status'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function isNew()
    {
         
        $sevenDaysAgo = now()->subDays(7);

        return $this->created_at >= $sevenDaysAgo;
    }
    
    public function attemptQuizzes()
    {
        return $this->hasMany(AttemptQuiz::class, 'quiz_id');
    }
    public function attempts()
{
    return $this->hasMany(Result::class); // Adjust 'Attempt' with the actual model name for attempts
}
    
}
