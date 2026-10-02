<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_name',
        'enrolled',
        'convinced',
        'convinced_other',
        'not_enrolled_reason',
        'not_enrolled_other',
        'likely_to_enroll',
        'likely_to_enroll_other',
        'program_clarity',
        'shadow_day',
        'contact_method',
        'contact_information',
        'team_contact',
        'comments',
    ];

    protected $casts = [
        'convinced' => 'array',
        'likely_to_enroll' => 'array',
    ];
}
