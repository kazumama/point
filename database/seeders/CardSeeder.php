<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'name' => 'rakuten',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
             DB::table('cards')->insert([
            'name' => 'ponta',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
       
       
    }
}
