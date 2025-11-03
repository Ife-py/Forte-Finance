<?php

namespace App\Models;
use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'description', 'phase','duration'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
