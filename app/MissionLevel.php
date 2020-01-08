<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionLevel extends Model
{
    protected $fillable = [
        'name',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
