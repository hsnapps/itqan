<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lesson_id',
        'rank',
        'name',
        'military_number',
        'department',
        'suggestion'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
