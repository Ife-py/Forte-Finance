<?php

namespace App\Models;
use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'description', 'phase','duration','start_time','end_time'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class);
    }
    
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];


}
