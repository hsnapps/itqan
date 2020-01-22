<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Lesson;
use App\Course;
use App\Question;
use App\LessonFile;

class LessonsController extends Controller
{
    public function newLesson(\App\Course $course)
    {
        // dd($course->missionLevel->id == 1);
        return view('admin.lessons.new', [
            'course' => $course,
            'title' => $course->name,
        ]);
    }

    public function viewLesson(Lesson $lesson) 
    {
        $showAlert = false;
        $alert = '';

        if ($lesson->image) {
            $path = Storage::disk('app-images')->path('lessons/'.$lesson->image);
            // $imageInfo = MediaInfo::extract($path);
            $imageInfo = getimagesize($path);
            $width = $imageInfo[0];
            $height = $imageInfo[1];
            $defaultWidth = (int)env('IMAGE_WIDTH', 640);
            $defaultHeight = (int)env('IMAGE_HEIGHT', 360);
            
            if ($width != $defaultWidth || $height != $defaultHeight) {
                $showAlert = true;
                $alert = __('admin.image-alaert', [
                    'width' => $width,
                    'height' => $height,
                    'defaultWidth' => $defaultWidth,
                    'defaultHeight' => $defaultHeight,
                ]);
            }
        }

        return view('admin.lessons.index', [
            'lesson' => $lesson,
            'course' => $lesson->course,
            'showAlert' => $showAlert,
            'alert' => $alert,
        ]);
    }

    public function addLesson(Request $request)
    {
        $course = Course::findOrfail($request->course_id);
        $lesson_index = $course->lessons->count() == 0 ? 1 : $course->lessons->last()->lesson_index + 1;

        $request->validate([
            'title' => 'required|max:50',
            'header' => 'required|max:80',
            'instructor' => 'required',
            'category' => 'required',
            'level' => 'required',
            'description' => 'max:1000',
        ]);

        // dd($request->all());

        $lesson = Lesson::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'header' => $request->header,
            'description' => $request->description,
            'instructor_id' => $request->instructor,
            'category_id' => $request->category,
            'level_id' => $request->level,
            'lesson_index' => $lesson_index,
        ]);

        if (!isset($lesson)) {
            return back()->with('error', __('admin.error'));
        }

        if (isset($request->image)) {
            $request->validate([
                'image' => 'file|image|mimes:jpeg,jpg,png|max:2097152',
            ]);
            if (!$request->file('image')->isValid()) {
                return back()->with('error', __('admin.error'));
            }

            $extension = $request->image->extension();
            $fileName = str_random(20 - 1 - strlen($extension)).".$extension";
            $request->image->storeAs('lessons', $fileName, 'app-images');
            $lesson->image = $fileName;
        } else {
            $placeHolder = 'place-holder.jpg';
            $fileName = str_random(16).'.jpg';
            Storage::disk('app-images')->copy($placeHolder, 'lessons/'.$fileName);
            $lesson->image = $fileName;
        }

        if (isset($request->video)) {
            $request->validate([
                'video' => 'file|mimes:mp4|max:20971520',
            ]);
            if (!$request->file('video')->isValid()) {
                return back()->with('error', __('admin.error'));
            }

            $fileName = str_random(20 - 1 - strlen($extension)).".mp4";
            $request->video->storeAs('', $fileName, 'app-videos');
            $lesson->video = $fileName;
        }

        if($lesson->save()) {
            return redirect()
            ->route('admin.courses.edit', ['course' => $course, 'tabs' => 'lessons'])
            ->with('success', __('admin.course.saved'));
        }
    }

    public function updateLesson(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);
        $lesson->update([
            'title' => $request->title,
            'header' => $request->header,
            'description' => $request->description,
            'instructor_id' => $request->instructor,
            'category_id' => $request->category,
            'level_id' => $request->level,
        ]);
        return back()->with('success', __('admin.lesson.saved'));
    }

    public function deleteLesson(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);
        if (deleteLesson($lesson)) {
            return redirect()->route('admin.courses.edit', ['course' => $course]);
        }
        return back()->with('error', __('admin.error'));
    }

    public function updateMultimedia(Request $request)
    {
        if (!$request->file->isValid()) {
            return back()->with('error', __('admin.error'));
        }

        $lesson = Lesson::findOrFail($request->id);
        $imageValidator = 'file|image|mimes:jpeg,jpg,png|max:2097152';
        $videoValidator = 'file|mimes:mp4|max:20971520';
        $disk = $request->type == 'image' ? 'app-images' : 'app-videos';
        $folder = $request->type == 'image' ? 'lessons' : '';
        $extension = $request->file->extension();
        $uploaded = $request->file;
        $fileName = str_random(20 - 1 - strlen($extension)).".$extension";
        $field = $request->type == 'image' ? 'image' : 'video';
        $old = $lesson[$field];

        $request->validate([
            'file' => $request->type == 'image' ? $imageValidator : $videoValidator,
        ]);

        $exists = Storage::disk($disk)->exists($lesson->video);
        if ($exists) {
            Storage::disk($disk)->delete($old);
        }
        $path = $request->file->storeAs($folder, $fileName, $disk);
        $lesson[$field] = $fileName;

        if($lesson->save()) {
            return back()->with('success', __('admin.lesson.saved'));
        }

        return back()->with('error', __('admin.error'));
    }
    
    public function removeMultimedia(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);

        switch ($request->type) {
            case 'image':
                $placeHolder = 'place-holder.jpg';
                $fileName = str_random(16).'.jpg';
                $oldFileName = $lesson->image;
                $copy = Storage::disk('app-images')->copy($placeHolder, "lessons/$fileName");
                $lesson->image = $fileName;
                $exists = Storage::disk('app-images')->exists($lesson->image);
                if ($exists) {
                    Storage::disk('app-images')->delete("lessons/$oldFileName");
                }
                if($copy && $lesson->save()) {
                    return back()->with('success', __('admin.lesson.saved'));
                }
                break;
            
            case 'video':
                $exists = Storage::disk('app-videos')->exists($lesson->video);
                if ($exists) {
                    Storage::disk('app-videos')->delete($lesson->video);
                }
                $lesson->video = null;
                if($lesson->save()) {
                    return back()->with('success', __('admin.lesson.saved'));
                }
                break;
        }
        
        return back()->with('error', __('admin.error'));
    }

    public function addQuestion(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);
        $question_index = $lesson->questions->count() == 0 ? 1 : $lesson->questions->last()->question_index + 1;

        Question::create([
            'lesson_id' => $request->id,
            'question' => $request->question,
            'A' => $request->A,
            'B' => $request->B,
            'C' => $request->C,
            'D' => $request->D,
            'correct' => $request->correct,
            'description' => null,
            'question_index' => $question_index,
        ]);

        return back()->with('success', __('admin.lesson.question_saved'));
    }

    public function updateQuestion(Request $request)
    {
        $question = Question::findOrFail($request->id);
        $question->update([
            'question' => $request->question,
            'A' => $request->A,
            'B' => $request->B,
            'C' => $request->C,
            'D' => $request->D,
            'correct' => $request->correct,
        ]);
        return back()->with('success', __('admin.lesson.question_saved'));
    }

    public function deleteQuestion(Request $request)
    {
        Question::destroy($request->id);
        return back()->with('success', __('admin.lesson.question_deleted'));
    }

    public function addFile(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);
        $question_index = $lesson->questions->count() == 0 ? 1 : $lesson->questions->last()->question_index + 1;

        $request->validate([
            'file' => 'file|mimes:doc,xdoc,pdf,jpeg,jpg,png,pptx,ppt|max:2097152',
            'title' => 'required|max:50',
            'description' => 'max:250',
        ]);

        if (!$request->file('file')->isValid()) {
            return back()->with('error', __('admin.error'));
        }

        $extension = $request->file->extension();
        $fileName = str_random(20 - 1 - strlen($extension)).".$extension";
        $path = $request->file->storeAs('', $fileName, 'app-files');

        LessonFile::create([
            'lesson_id' => $request->id,
            'title' => $request->title,
            'description' => $request->description,
            'file_name' => $fileName,
        ]);

        return back()->with('success', __('admin.lesson.file_saved'));
    }

    public function updateFile(Request $request)
    {
        $file = LessonFile::findOrFail($request->id);
        $file->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return back()->with('success', __('admin.lesson.file_saved'));
    }

    public function deleteFile(Request $request)
    {
        $file = LessonFile::findOrFail($request->id);
        $exists = Storage::disk('app-files')->exists($file->file_name);
        if ($exists) {
            Storage::disk('app-files')->delete($file->file_name);
        }
        $file->delete();
        return back()->with('success', __('admin.lesson.file_deleted'));
    }

    public function downloadFile(LessonFile $file)
    {
        $pathToFile = Storage::disk('app-files')->path($file->file_name);
        $pos = strrpos($file->file_name, '.');
        $extension = strtolower(substr($file->file_name, $pos + 1));
        return response()->download($pathToFile, $file->title.'.'.$extension);
    }
}
