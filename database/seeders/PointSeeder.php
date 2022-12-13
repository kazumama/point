<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 1,
            'point_charge' =>'2',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 1,
            'point_charge' =>'1',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
         DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 1,
            'point_charge' =>'4',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
         DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 1,
            'point_charge' =>'1',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
         DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 2,
            'point_charge' =>'1',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
         DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 3,
            'point_charge' =>'3',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            DB::table('points')->insert([
            'user_id' => 2,
            'card_id' => 4,
            'point_charge' =>'3',
            'point_expiration' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
