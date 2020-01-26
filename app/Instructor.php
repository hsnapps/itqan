<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'info',
    ];

    protected $casts = [
        'info' => 'array'
    ];

    protected $dates = ['deleted_at'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
