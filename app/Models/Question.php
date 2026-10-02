<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
// Question.php

class Question extends Model
{
    protected $fillable=['exam_id','question','option_one', 'option_two','option_three','option_four','status'];
    public function quiz()
    {
        return $this->belongsTo(Attemptquiz::class); // Make sure Attemptquiz is correctly defined
    }

    public function choices()
    {
        return $this->hasMany(Answer::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'exam_id', 'id'); // Check the Result model and attributes
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}   
