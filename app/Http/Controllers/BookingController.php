<?php

// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\TblBooking;
use App\Models\TblGuest;
use App\Models\TblRoom;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'roomNo' => 'required|exists:tblroom,RoomNo',
            'checkin' => 'required|date_format:d/m/Y|after_or_equal:' . Carbon::now()->addDays(2)->format('d/m/Y'),
            'checkout' => 'required|date_format:d/m/Y|after:checkin',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0'
        ]);

        // Convert check-in and check-out dates to the proper format
        $checkin = Carbon::createFromFormat('d/m/Y', $request->checkin)->format('Y-m-d');
        $checkout = Carbon::createFromFormat('d/m/Y', $request->checkout)->format('Y-m-d');

        // Get the guest information using the authenticated user
        $guest = TblGuest::where('GuestID', Auth::id())->firstOrFail();

        // Create a new booking
        TblBooking::create([
            'GuestID' => $guest->GuestID,
            'RoomNo' => $request->roomNo,
            'BookingDate' => Carbon::now()->toDateString(),
            'BookingTime' => Carbon::now()->toTimeString(),
            'ArrivalDate' => $checkin,
            'DepartureDate' => $checkout,
            'NumAdults' => $request->adults,
            'NumChildren' => $request->children,
            'Status' => 0, // Assuming default status as 0
        ]);

        $room = TblRoom::where('RoomNo', $request->roomNo)->first();
        $room->Status = 0;
        $room->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Room booked successfully. Your request will be verified within 24 hours');
    }
}