<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lesson_id',
        'question',
        'A',
        'B',
        'C',
        'D',
        'correct',
        'question_index',
    ];

    protected $dates = ['deleted_at'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
