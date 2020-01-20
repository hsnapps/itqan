<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'mission_level_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function missionLevel()
    {
        return $this->belongsTo(MissionLevel::class);
    }
}
