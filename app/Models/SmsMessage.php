<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipient_number',
        'sender_number',
        'direction',
        'category',
        'twilio_message_sid',
        'status',
        'body',
        'error',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMatchedUserAttribute()
    {
        $number = $this->direction === 'inbound' ? $this->sender_number : $this->recipient_number;
        if (!$number) return null;
        $digits = preg_replace('/\D+/', '', (string) $number);
        if (!$digits) return null;
        $last10 = substr($digits, -10);
        if (!$last10) return null;
        $candidates = User::whereNotNull('phone_number')->get(['id','phone_number','first_name','last_name']);
        foreach ($candidates as $u) {
            $ud = preg_replace('/\D+/', '', (string) $u->phone_number);
            if (substr($ud, -10) === $last10) {
                return $u;
            }
        }
        return null;
    }
}
