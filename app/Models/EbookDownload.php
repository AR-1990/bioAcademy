<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'form_type',
    ];
}
