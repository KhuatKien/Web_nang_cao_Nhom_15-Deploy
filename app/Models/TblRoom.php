<?php

// app/Models/TblRoom.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRoom extends Model
{
    protected $table = 'tblroom';
    protected $primaryKey = 'RoomNo';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'RoomNo', 'RoomType', 'Status'
    ];

    public function roomType()
    {
        return $this->belongsTo(TblRoomType::class, 'RoomType', 'RoomType');
    }

    public function bookings()
    {
        return $this->hasMany(TblBooking::class, 'RoomNo', 'RoomNo');
    }
}