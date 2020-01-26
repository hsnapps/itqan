<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    const MAX = 40;
    
    use SoftDeletes;
    
    protected $fillable = [
        'lesson_id',
        'rank',
        'name',
        'military_number',
        'department',
        'suggestion',
        'notes',
        'shown_at',
    ];

    protected $dates = [
        'deleted_at',
        'shown_at'
    ];

    public function getNotes()
    {
        if (!isset($this->notes)) {
            return null;
        }

        if (strlen($this->notes) > self::MAX) {
            return substr($this->notes, 0, self::MAX).'...';
        } 
        
        return $this->notes;
    }

    public function getSuggestion()
    {
        if (!isset($this->suggestion)) {
            return null;
        }

        if (strlen($this->suggestion) > self::MAX) {
            return substr($this->suggestion, 0, self::MAX).'...';
        } 
        
        return $this->suggestion;
    }

    public function getRankName()
    {
        if (!isset($this->rank)) {
            return $this->name;
        }

        return sprintf('%s/ %s', $this->rank, $this->name);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
