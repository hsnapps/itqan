<?php

use Illuminate\Database\Seeder;
use App\Course;

class MissionLevelCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'الاتصال',
            'description' => 'مهارات الاتصال السلكي واللاسلكي وأمن الاتصالات',
            'image' => str_random(16).'.jpg',
            'category_id' => 2,
            'mission_level_id' => 2,
        ]);

        Course::create([
            'name' => 'الملاحة البرية',
            'description' => 'التدريب على علم الطبوغرافيا والخرائط',
            'image' => str_random(16).'.jpg',
            'category_id' => 2,
            'mission_level_id' => 2,
        ]);

        Course::create([
            'name' => 'الوقاية من أسلحة التدمير الشامل',
            'description' => 'معلومات عامة عن أسلحة التدمير الشامل',
            'image' => str_random(16).'.jpg',
            'category_id' => 2,
            'mission_level_id' => 2,
        ]);

        Course::create([
            'name' => 'الأسلحة الفردية (الصغيرة)',
            'description' => 'مهارات استخدام الأسلحة الفردية والقنابل اليدوية',
            'image' => str_random(16).'.jpg',
            'category_id' => 2,
            'mission_level_id' => 2,
        ]);

        Course::create([
            'name' => 'الإسعافات الأولية',
            'description' => 'مهارات الإسعافات الأولية والإنقاذ',
            'image' => str_random(16).'.jpg',
            'category_id' => 2,
            'mission_level_id' => 2,
        ]);
    }
}
