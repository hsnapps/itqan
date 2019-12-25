<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Hassan Baabdullah',
            'email' => 'adx272@rsadf.mil',
            'password' => bcrypt('1234'),
        ]);
    }
}
