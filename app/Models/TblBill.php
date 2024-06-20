<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBill extends Model
{
    protected $table = 'tblbill';
    protected $primaryKey = 'BillID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'BillID', 'BookingID', 'RoomCharge', 'PaymentDate', 'ExpireDate', 'TotalPrice'
    ];

    public function booking()
    {
        return $this->belongsTo(TblBooking::class, 'BookingID', 'BookingID');
    }
}