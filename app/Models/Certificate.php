<?php

namespace App\Models;
use App\Models\User;
use App\Models\courses;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'certificate_image',
        'certificate_title',
        'issued_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(courses::class, 'course_id');
    }
}
