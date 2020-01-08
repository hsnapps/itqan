<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Question::create([
            'lesson_id' => 1,
            'question' => 'السؤال الأول السؤال الأول السؤال الأول',
            'A' => 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول',
            'B' => 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني',
            'C' => 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث',
            'D' => 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع',
            'correct' => 'B',
        ]);

        App\Question::create([
            'lesson_id' => 1,
            'question' => 'السؤال الثاني السؤال الثاني السؤال الثاني',
            'A' => 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول',
            'B' => 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني',
            'C' => 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث',
            'D' => 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع',
            'correct' => 'B',
        ]);

        App\Question::create([
            'lesson_id' => 1,
            'question' => 'السؤال الثالث السؤال الثالث السؤال الثالث',
            'A' => 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول',
            'B' => 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني',
            'C' => 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث',
            'D' => 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع',
            'correct' => 'B',
        ]);

        App\Question::create([
            'lesson_id' => 1,
            'question' => 'السؤال الرابع السؤال الرابع السؤال الرابع',
            'A' => 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول',
            'B' => 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني',
            'C' => 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث',
            'D' => 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع',
            'correct' => 'B',
        ]);

        App\Question::create([
            'lesson_id' => 1,
            'question' => 'السؤال الخامس السؤال الخامس السؤال الخامس',
            'A' => 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول',
            'B' => 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني',
            'C' => 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث',
            'D' => 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع',
            'correct' => 'B',
        ]);
    }
}
