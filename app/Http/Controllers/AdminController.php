<?php

namespace App\Http\Controllers;

use App\Models\TblBooking;
use App\Models\TblRoom;
use App\Models\Tbltable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function admin(){
        $userCount = User::count() - 1;
        $roomCount = TblRoom::count();
        $bookingCount = TblBooking::count();
        $tableCount = Tbltable::count();
        return view('admin/admin', ['userCount' => $userCount,'roomCount' => $roomCount,'bookingCount' => $bookingCount,'tableCount' => $tableCount]);
    }  
    public function loginadmin(){
        return view('admin/loginadmin');
    }  
    public function postLoginAdmin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>1]))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error','Wrong account or password information');
    }  
}
