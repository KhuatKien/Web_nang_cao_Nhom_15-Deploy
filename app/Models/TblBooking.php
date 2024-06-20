<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBooking extends Model
{
    use HasFactory;

    protected $table = 'tblbooking';
    protected $primaryKey = 'BookingID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'GuestID', 'RoomNo', 'BookingDate', 'BookingTime', 'ArrivalDate', 'DepartureDate', 'NumAdults', 'NumChildren', 'Status'
    ];

    public function guest()
    {
        return $this->belongsTo(TblGuest::class, 'GuestID','GuestID');
    }

    public function bill()
    {
        return $this->hasOne(TblBill::class, 'BookingID', 'BookingID');
    }
    
    public function room()
    {
        return $this->belongsTo(TblRoom::class, 'RoomNo', 'RoomNo'); // Định nghĩa mối quan hệ belongsTo với model TblRoom
    }
}