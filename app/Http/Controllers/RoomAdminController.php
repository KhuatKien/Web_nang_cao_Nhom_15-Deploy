<?php

namespace App\Http\Controllers;

use App\Models\TblRoom;
use Illuminate\Http\Request;

class RoomAdminController extends Controller
{
    public function index()
    {
        $rooms = TblRoom::all();
        $roomTypes = ['Deluxe Room', 'Double Room', 'Family Room', 'Junior Suite']; // Đây là ví dụ, bạn có thể thay đổi theo loại phòng của bạn
        return view('admin.roomAdmin', ['rooms' => $rooms, 'roomTypes' => $roomTypes]);
    }

    public function store(Request $request)
    {
        $room = new TblRoom();
        $room->RoomNo = $request->input('RoomNo');
        $room->RoomType = $request->input('RoomType');
        $room->Status = $request->input('Status');
        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }

    public function destroy($id)
    {
        $room = TblRoom::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}