<?php

namespace App\Http\Controllers;

use App\Models\TblRoomType;
use App\Models\Tbltable;
use Illuminate\Http\Request;

class RoomTypeAdminController extends Controller
{
    public function index()
    {
        $roomTypes = TblRoomType::all();
        return view('admin.roomTypeAdmin', compact('roomTypes'));
    }

    public function deactivate($id)
    {
        $roomType = TblRoomType::findOrFail($id);
        $roomType->Status = 0; // Set Status to 0 for deactivation
        $roomType->save();

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type deactivated successfully.');
    }

    public function activate($id)
    {
        $roomType = TblRoomType::findOrFail($id);
        $roomType->Status = 1; // Set Status to 1 for activation
        $roomType->save();

        return redirect()->route('admin.roomtypes.index')->with('success', 'Room type activated successfully.');
    }
}