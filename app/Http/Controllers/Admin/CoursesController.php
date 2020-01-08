<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Course;

class CoursesController extends Controller
{
    public function viewCourse(Course $course)
    {
        return view('admin.courses.edit', [
            'course' => $course,
            'title' => $course->name
        ]);
    }

    public function courseLessons(Course $course)
    {
        return view('admin.lessons.index', [
            'lessons' => $course->lessons,
            'title' => __('admin.lessons-of', ['course' => $course->name]),
        ]);
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'max:1000',
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);

        if (!isset($course)) {
            return back()->with('error', __('admin.error'));
        }

        if (isset($request->image)) {
            $request->validate([
                'image' => 'file|image|mimes:jpeg,jpg,png|max:2097152',
            ]);
            if (!$request->file('image')->isValid()) {
                return back()->with('error', __('admin.error'));
            }

            $uploadedFile = $request->image;
            $extension = $request->image->extension();
            $fileName = str_random(20 - 1 - strlen($extension)).".$extension";
            $path = $request->image->storeAs('courses', $fileName, 'app-images');
            $course->image = $fileName;
        }

        if($path && $course->save()) {
            return redirect()
            ->route('admin.courses.edit', ['course' => $course])
            ->with('success', __('admin.course.saved'));
        }
    }

    public function updateCourse(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->name = $request->name;
        $course->category_id = $request->category;
        $course->description = $request->description;

        if ($course->save()) {
            return back()->with('success', __('admin.course.saved'));
        }
        return back()->with('error', __('admin.error'));
    }

    public function deleteCourse(Request $request)
    {
        $course = Course::findOrFail($request->id);
        foreach ($course->lessons as $lesson) {
            deleteLesson($lesson);
        }

        // Delete image
        $exists = Storage::disk('app-images')->exists("courses/$course->image");
        if ($exists) {
            Storage::disk('app-images')->delete("courses/$course->image");
        }
        
        $course->delete();
        return redirect()->route('admin.courses');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'file|image|mimes:jpeg,jpg,png|max:2097152',
        ]);

        if (!$request->file('image')->isValid()) {
            return back()->with('error', __('admin.error'));
        }

        $course = Course::findOrFail($request->id);
        $uploadedFile = $request->image;
        $extension = $request->image->extension();
        $fileName = str_random(20 - 1 - strlen($extension)).".$extension";
        $oldFileName = $course->image;
        $path = $request->image->storeAs('courses', $fileName, 'app-images');
        $course->image = $fileName;
        if($path && $course->save()) {
            Storage::disk('app-images')->delete("courses/$oldFileName");
            return back()->with('success', __('admin.course.saved'));
        }
        return back()->with('error', __('admin.error'));
    }

    public function removeImage(Request $request)
    {
        $placeHolder = 'place-holder.jpg';
        $fileName = str_random(16).'.jpg';
        $course = Course::findOrFail($request->id);
        $oldFileName = $course->image;
        $copy = Storage::disk('app-images')->copy($placeHolder, 'courses/'.$fileName);
        $course->image = $fileName;
        if($copy && $course->save()) {
            Storage::disk('app-images')->delete("courses/$oldFileName");
            return back()->with('success', __('admin.course.saved'));
        }
        return back()->with('error', __('admin.error'));
    }
}
