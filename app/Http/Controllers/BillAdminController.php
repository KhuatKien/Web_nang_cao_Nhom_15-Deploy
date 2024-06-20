<?php

namespace App\Http\Controllers;

use App\Models\TblBill;
use Illuminate\Http\Request;

class BillAdminController extends Controller
{
    public function index(){
        $bills = TblBill::all();
        return view('admin.billAdmin', ['bills' => $bills]);
    }
}
