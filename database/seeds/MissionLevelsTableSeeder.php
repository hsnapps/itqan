<?php

use Illuminate\Database\Seeder;

class MissionLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\MissionLevel::create(['name' => 'المحتوى المعرفي للمستوى المهاري الأول']);
        App\MissionLevel::create(['name' => 'المحتوى المعرفي للمستوى المهاري الثاني']);
        App\MissionLevel::create(['name' => 'المحتوى المعرفي للمستوى المهاري الثالث']);
        App\MissionLevel::create(['name' => 'المحتوى المعرفي للمستوى المهاري الرابع']);
    }
}
