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
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_user');
    }

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];


}
