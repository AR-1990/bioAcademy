<?php

// AdminAnswer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAnswer extends Model
{
    protected $fillable = ['comment_id', 'reply'];

    public function moduleData()
    {
        return $this->hasMany(ModuleData::class, 'comment_id')->whereNull('parent_comment_id');
    }
    
}
