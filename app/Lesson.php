<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lesson_index',
        'title',
        'header',
        'description',
        'image',
        'video',
        'instructor_id',
        'category_id',
        'level_id',
        'course_id'
    ];

    protected $dates = ['deleted_at'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function files()
    {
        return $this->hasMany(LessonFile::class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
