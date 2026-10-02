<?php
namespace App\Models;
use App\Models\AdminAnswer;
use App\Models\ModuleData;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddModule extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_number', 'lesson_name', 'description', 'url'];



}
