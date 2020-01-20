<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Lesson;

class MissionLevelLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Lesson::create([
            'lesson_index' => 1,
            'title',
            'header',
            'description',
            'image',
            'video',
            'instructor_id',
            'category_id',
            'level_id',
            'course_id'
        ]);
    }
}
