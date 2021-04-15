<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ibrahim',
            'email' => 'highbee4u@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
