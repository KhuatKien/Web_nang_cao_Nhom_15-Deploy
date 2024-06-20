<?php

namespace App\Http\Controllers;

use App\Models\TblGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login'); // Chuyển hướng đến trang đăng nhập nếu không có người dùng được xác thực
        }
        
        $guest = $user->guests; // Giả sử người dùng chỉ có thể có một khách liên quan

        return view('profile.profile', compact('user', 'guest'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login'); // Chuyển hướng đến trang đăng nhập nếu không có người dùng được xác thực
        }
        
        $guest = $user->guests;

        $request->validate([
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'passport' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        if ($guest) {
            // Cập nhật bản ghi khách hiện tại
            $guest->update([
                'DOB' => $request->dob,
                'Gender' => $request->gender,
                'PhoneNo' => $request->phone,
                'PassportNo' => $request->passport,
                'Address' => $request->address,
                'Postcode' => $request->postcode,
                'City' => $request->city,
                'Country' => $request->country,
            ]);
        } else {
            // Tạo bản ghi khách mới với id của người dùng làm GuestID
            TblGuest::create([
                'GuestID' => $user->id,
                'DOB' => $request->dob,
                'Gender' => $request->gender,
                'PhoneNo' => $request->phone,
                'PassportNo' => $request->passport,
                'Address' => $request->address,
                'Postcode' => $request->postcode,
                'City' => $request->city,
                'Country' => $request->country,
            ]);
        }

        return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công.');
    }

}
