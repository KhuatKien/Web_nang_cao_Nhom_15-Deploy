<?php

// database/seeders/RoomSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('tblroom')->insert([
            ['RoomNo' => 101, 'RoomType' => 'Junior Suite', 'status' => 1],
            ['RoomNo' => 102, 'RoomType' => 'Junior Suite', 'status' => 1],
            ['RoomNo' => 201, 'RoomType' => 'Double Room', 'status' => 1],
            ['RoomNo' => 202, 'RoomType' => 'Double Room', 'status' => 1],
            ['RoomNo' => 301, 'RoomType' => 'Family Room', 'status' => 1],
            ['RoomNo' => 302, 'RoomType' => 'Family Room', 'status' => 1],
            ['RoomNo' => 401, 'RoomType' => 'Deluxe Room', 'status' => 1],
            ['RoomNo' => 402, 'RoomType' => 'Deluxe Room', 'status' => 1],
        ]);
    }
}