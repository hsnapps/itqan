<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create(['name' => 'admin']);
        App\Role::create(['name' => 'courses']);
        App\Role::create(['name' => 'lessons']);
        App\Role::create(['name' => 'multimedia']);
        App\Role::create(['name' => 'users']);
        App\Role::create(['name' => 'tables']);
    }
}
