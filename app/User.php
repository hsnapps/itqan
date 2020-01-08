<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
        'section',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        // 'is_admin' => 'boolean',
    ];

    public function isAdmin()
    {
        return $this->roles()->findMany([1])->count() != 0;
    }

    public function canCourses()
    {
        return $this->roles()->findMany([1, 2])->count() != 0;
    }

    public function canLessons()
    {
        return $this->roles()->findMany([1, 3])->count() != 0;
    }

    public function canMultimedia()
    {
        return $this->roles()->findMany([1, 4])->count() != 0;
    }

    public function canUsers()
    {
        return $this->roles()->findMany([1, 5])->count() != 0;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
