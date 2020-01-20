<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\Facades\MediaInfo;
use App\Lesson;
use App\Instructor;
use App\Category;
use App\Level;
use App\MissionLevel;
use App\Suggestion;
use App\Question;
use App\Course;

class MainController extends Controller
{
    public function index()
    {
        // $trackInfo = MediaInfo::extract(public_path('videos\\lesson-1.mp4'));
        return view('index');
    }

    public function about()
    {
        return view('about', [
            'title' => __('app.about-title'),
        ]);
    }

    public function viewCourse(Course $course)
    {
        return view('course', [
            'course' => $course,
            'title' => __('app.course-title', ['name' => $course->name]),
        ]);
    }

    public function viewLesson(Lesson $lesson)
    {
        $questions = [];
        if ($lesson->questions->count() > 0) {
            $random_keys = array_rand($lesson->questions->toArray(), env('QUESTIONS', 3));
            foreach ($random_keys as $key) {
                // dd($lesson->questions[$key]->toArray());
                array_push($questions, $lesson->questions[$key]->toArray());
            }
        }

        // dd($lesson->questions->toArray());

        return view('lesson', [
            'lesson' => $lesson,
            'questions' => count($questions) > 0 ? json_encode($questions) : null,
        ]);
    }

    public function viewInstructor(Instructor $instructor)
    {
        return view('instructor', [
            'ins' => $instructor,
            'title' => $instructor->name,
        ]);
    }

    public function viewCategory(Category $category)
    {
        return view('category', [
            'cat' => $category,
            'title' => $category->name,
        ]);
    }

    public function viewLevel(Level $level)
    {
        return view('level', [
            'lev' => $level,
            'title' => $level->name,
        ]);
    }

    public function viewMissionLevel(MissionLevel $missionLevel)
    {
        return view('mission-level', [
            'lev' => $missionLevel->id,
            'title' => $missionLevel->name,
        ]);
    }

    public function viewMultimedia()
    {
        return view('multimedia', [
            'title' => __('app.multimedia'),
        ]);
    }

    public function addSuggesion(Request $request)
    {
        // dd($request);
        $suggestion = Suggestion::create([
            'lesson_id' => $request->lesson_id,
            'rank' => $request->rank,
            'name' => $request->name,
            'military_number' => $request->military_number,
            'department' => $request->department,
            'suggestion' => $request->suggestion,
        ]);
        
        // ?section=3
        $headers = [
            'query' => [
                'section' => '3'
            ]
        ];
        if ($suggestion) {
            return back(302, $headers)->with('success', __('app.suggestion-message'));
        }

        return back()->with('error', __('app.error'));
    }

    public function evaluate(Request $request)
    {
        $pass = true;
        $mark = 0;
        $questions = [];
        $answers = [];
        $corrects = [];

        for ($i=0; $i < count($request->questions); $i++) { 
            $id = $request->questions[$i];

            $question = Question::find($id);
            $answer = $request->answers[$i];
            $correct = __('app.letters.'.$question->correct);
            $max = count($request->questions);

            array_push($questions, $question->question);
            array_push($answers, $answer.' - '.$question[__('app.letters.'.$answer)]);
            array_push($corrects, $correct.' - '.$question[__('app.letters.'.$correct)]);

            if ($answer === $correct) {
                $mark++;
            }
        }

        $percentage = round(($mark / $max) * 100, 2);

        return response()->json([
            'questions' => $questions,
            'answers' => $answers,
            'corrects' => $corrects,
            'max' => $max,
            'mark' => $mark,
            'percentage' => $percentage,
            'pass' => $percentage > 60,
        ]);
    }
}
