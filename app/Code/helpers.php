<?php

use App\Course;
use App\Lesson;
use App\LessonFile;
use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

function hindi($value)
{
    if (!isset($value) || strlen($value) == 0) {
        return '';
    }

    $western_arabic = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
    $eastern_arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', ','); 
    return str_replace($western_arabic, $eastern_arabic, $value);
}

function deleteLesson(Lesson $lesson): bool
{
    $course = $lesson->course;
    DB::beginTransaction();

    // Delete fiiles
    foreach ($lesson->files as $file) {
        $exists = Storage::disk('app-files')->exists($file);
        if ($exists) {
            Storage::disk('app-files')->delete($file);
        }
    }

    // Delete LessonFile records
    $filesIds = $lesson->files->map(function ($item) {
        return $item->id;
    })->toArray();
    LessonFile::destroy($filesIds);

    // Delete image
    $exists = Storage::disk('app-images')->exists("lessons/$lesson->image");
    if ($exists) {
        Storage::disk('app-images')->delete("lessons/$lesson->image");
    }
    $lesson->image = null;

    // Delete video
    $exists = Storage::disk('app-videos')->exists($lesson->video);
    if ($exists) {
        Storage::disk('app-videos')->delete($lesson->video);
    }
    $lesson->video = null;

    // Delete questions
    $questionIds = $lesson->questions->map(function ($item) {
        return $item->id;
    })->toArray();
    Question::destroy($questionIds);

    // Delete lesson
    $lesson->delete();

    DB::commit();

    return true;
}
