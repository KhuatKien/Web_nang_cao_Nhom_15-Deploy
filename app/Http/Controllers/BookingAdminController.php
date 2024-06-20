<?php

namespace App\Http\Controllers;

use App\Models\TblBooking;
use App\Models\TblRoom;
use App\Models\TblBill;
use App\Models\TblGuest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index()
    {
        $bookings = TblBooking::all();
        // $rooms = TblRoom::all();
        $guests = TblGuest::all();
        return view('admin.bookingAdmin', compact('bookings'));
    }

    // public function store(Request $request)
    // {
    //     $booking = new TblBooking();
    //     $booking->GuestID = $request->input('GuestID');
    //     $booking->RoomNo = $request->input('RoomNo');
    //     $booking->BookingDate = now()->toDateString();
    //     $booking->BookingTime = now()->toTimeString();
    //     $booking->ArrivalDate = $request->input('ArrivalDate');
    //     $booking->DepartureDate = $request->input('DepartureDate');
    //     $booking->NumAdults = $request->input('NumAdults');
    //     $booking->NumChildren = $request->input('NumChildren');
    //     $booking->Status = $request->input('Status');
    //     $booking->save();

    //     return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    // }

    public function confirmBooking($id)
    {
        $booking = TblBooking::findOrFail($id);
        $booking->Status = 1;
        $booking->save();

            // Gửi email thông báo cho người dùng
        Mail::to($booking->guest->user->email)->send(new ConfirmMail($booking));
        return redirect()->route('admin.bookings.index')->with('success', 'Booking confirmed successfully.');
    }

    public function createBill($id)
    {
        // Tìm kiếm thông tin booking dựa vào ID
        $booking = TblBooking::with('room')->findOrFail($id);

        // Lấy roomCharge từ RoomPrice của RoomType của phòng đó
        $roomCharge = $booking->room->roomType->RoomPrice;

        // Tính toán total price, ở đây sẽ bằng roomCharge vì chỉ có phòng
        $totalPrice = $roomCharge;

        // Tạo đối tượng Bill và lưu vào CSDL
        $bill = new TblBill();
        // $bill->BillID = uniqid();
        $bill->BookingID = $booking->BookingID;
        $bill->RoomCharge = $roomCharge;
        $bill->PaymentDate = now()->toDateString();
        $bill->ExpireDate = now()->toDateString();
        $bill->TotalPrice = $totalPrice;
        $bill->save();

        // Cập nhật trạng thái của phòng trong bảng tblroom về 0 (trống)
        $room = $booking->room;
        $room->Status = 1;
        $room->save();


        return redirect()->route('admin.bookings.index')->with('success', 'Bill created successfully.');
    }
}