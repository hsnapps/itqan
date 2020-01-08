<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonFile extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lesson_id',
        'title',
        'description',
        'file_name',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function icon() 
    {
        if (!isset($this->file_name)) {
            return '';
        }
        $pos = strrpos($this->file_name, '.');
        $ext = strtolower(substr($this->file_name, $pos + 1));
        switch ($ext) {
            case 'pdf':
                return 'fa fa-file-pdf-o';
            
            case 'doc':
            case 'odt':
            case 'docx':
                return 'fa fa-file-word-o';

            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'bmp':
                return 'fa fa-file-image-o';
            
            case 'pptx':
            case 'ppt':
                return 'fa fa-file-powerpoint-o';
            
            default:
                return 'fa fa-file-o';
        }
    }
}
