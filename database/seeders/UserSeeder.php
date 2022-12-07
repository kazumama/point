<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'a',
        'email' => 'kazuma@gmail.com',
        'password' => bcrypt('a'),
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ]);
    }
}
