<?php

namespace App\Http\Controllers;

use App\Models\TblRoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $roomTypes = TblRoomType::where('status', 1)->get();

        return view('home/index', compact('roomTypes'));
    }
}