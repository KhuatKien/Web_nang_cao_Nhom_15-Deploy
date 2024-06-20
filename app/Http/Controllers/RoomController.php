<?php

namespace App\Http\Controllers;

use App\Models\TblRoom;
use App\Models\TblRoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function roomlist()
    {
        // Lấy tất cả các loại phòng có status bằng 1 từ bảng `tblroomtype`
        $roomTypes = TblRoomType::where('status', 1)->get();

        // Truyền dữ liệu tới view `room.room`
        return view('room.room', compact('roomTypes'));
    }

    public function detail($roomType)
    {
        // Lấy thông tin chi tiết của loại phòng từ bảng `tblroomtype`
        $roomType = TblRoomType::where('RoomType', $roomType)->where('status', 1)->first();

        // Kiểm tra nếu loại phòng không tồn tại
        if (!$roomType) {
            abort(404, 'Room type not found');
        }

        // Truyền dữ liệu tới view `rooms.show`
        return view('room.detail', compact('roomType'));
    }

    public function getRoomsByType($roomType)
    {
        $rooms = TblRoom::where('RoomType', $roomType)->where('Status', 1)->get();
        return response()->json($rooms);
    }
}