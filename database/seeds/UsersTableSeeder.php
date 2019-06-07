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
        DB::table('users')->insert([
            'name' => "test_user",
            'email' => "test@test.com",
            'password' => bcrypt('testtest'),
        ]);
    }
}
