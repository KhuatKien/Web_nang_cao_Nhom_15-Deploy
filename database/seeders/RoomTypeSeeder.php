<?php

// database/seeders/RoomTypeSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('tblroomtype')->insert([
            ['RoomType' => 'Junior Suite', 'RoomPrice' => 150, 'RoomDesc' => 'A single room with a single bed.', 'Occupancy' => 1, 'status' => 1, 'image_path' => 'assets/image/JuniorSuite.jpg'],
            ['RoomType' => 'Family Room', 'RoomPrice' => 200, 'RoomDesc' => 'A family room with multiple beds.', 'Occupancy' => 4, 'status' => 1, 'image_path' => 'assets/image/FamilyRoom.jpg'],
            ['RoomType' => 'Double Room', 'RoomPrice' => 250, 'RoomDesc' => 'A double room with a double bed.', 'Occupancy' => 2, 'status' => 1, 'image_path' => 'assets/image/DoubleRoom.jpg'],
            ['RoomType' => 'Deluxe Room', 'RoomPrice' => 300, 'RoomDesc' => 'A luxury suite with a king-size bed.', 'Occupancy' => 2, 'status' => 1, 'image_path' => 'assets/image/DeluxeRoom.jpg'],
        ]);
    }
}