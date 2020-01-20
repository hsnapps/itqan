<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionLevel extends Model
{
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
