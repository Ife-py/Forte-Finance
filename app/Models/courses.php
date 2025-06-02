<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'level',
        'image_path',
        'audio_path',
        'video_path',
        'duration',
        'instructor',
        'start_date',
        'end_date',
    ];



}
