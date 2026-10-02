<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=['user_id','exam_id','first_name','QuizName','NoOfQuestions','decimal_column'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz() {
        return $this->belongsTo(Attemptquiz::class, 'exam_id');
    }
}
