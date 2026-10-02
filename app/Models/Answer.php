<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;


// Choice.php

class Answer extends Model
{
    protected $fillable = ['question_id','correct_answer','status'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    
    public function studentAnswers()
    {
        return $this->hasMany(Attemptquiz::class, 'admin_answer_id');
    }
    
}

 

