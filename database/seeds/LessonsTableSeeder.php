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
            'title' => 'الدرس الأول',
            'header' => 'عنوان الدرس الأول',
            'description' => 'محتوى الدرس الأول',
        ]);

        App\Lesson::create([
            'title' => 'الدرس الثاني',
            'header' => 'عنوان الدرس الثاني',
            'description' => 'محتوى الدرس الثاني',
        ]);

        App\Lesson::create([
            'title' => 'الدرس الثالث',
            'header' => 'عنوان الدرس الثالث',
            'description' => 'محتوى الدرس الثالث',
        ]);

        App\Lesson::create([
            'title' => 'الدرس الرابع',
            'header' => 'عنوان الدرس الرابع',
            'description' => 'محتوى الدرس الرابع',
        ]);

        App\Lesson::create([
            'title' => 'الدرس الخامس',
            'header' => 'عنوان الدرس الخامس',
            'description' => 'محتوى الدرس الخامس',
        ]);

        App\Lesson::create([
            'title' => 'الدرس السادس',
            'header' => 'عنوان الدرس السادس',
            'description' => 'محتوى الدرس السادس',
        ]);
    }
}
