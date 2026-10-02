<?php

// ModuleData.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleData extends Model
{
    protected $fillable = ['comment','status', 'user_id', 'lesson_id', 'parent_comment_id','comment_id'];
    public function AddModule()
    {
        return $this->belongsTo(AddModule::class, 'lesson_id');
    }


     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ModuleData::class, 'parent_comment_id', 'id');
    }

    public function adminAnswer()
    {
        return $this->hasMany(AdminAnswer::class, 'comment_id', 'id');
    }
    
}



