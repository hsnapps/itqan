<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Lesson::create([
            'title' => 'مدخل إلى نظام Moodle',
            'header' => 'نظام التعليم الإلكتروني,دليلك لفهم',
            'description' => 'نظام التعليم الإلكتروني Moodle ومدى تأثيره على منظمتك التعليمية',
            'image' => 'lesson_0.png',
            'instructor_id' => 1,
            'category_id' => 1,
            'level_id' => 1,
        ]);
    }
}
