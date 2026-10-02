<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttemptQuiz extends Model
{
    use HasFactory;

  // In AttemptQuiz model
protected $fillable = ['quiz_id','user_id', 'question_id', 'selected_options'];


    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function examName()
    {
        return $this->belongsTo(ExamName::class, 'quiz_id');
    }
    public function adminAnswer()
    {
        return $this->belongsTo(Answer::class, 'admin_answer_id');
    }
}
