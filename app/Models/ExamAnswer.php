<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_attempt_id',
        'question_id',
        'option_id',
        'is_correct',
    ];

    public function attempt()
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
