<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Course::create([
            'name' => 'الدورة الأولى',
            'description' => 'وصف مختصر للدورة الأولى',
        ]);
    }
}
