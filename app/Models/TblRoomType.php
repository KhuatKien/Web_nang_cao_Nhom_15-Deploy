<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRoomType extends Model
{
    use HasFactory;

    protected $table = 'tblroomtype';
    protected $primaryKey = 'RoomType';
    public $incrementing = false; // Nếu RoomType là chuỗi và không phải số nguyên
    protected $keyType = 'string'; // Nếu RoomType là chuỗi
    public $timestamps = false;

    protected $fillable = [
        'RoomType', 'RoomPrice', 'RoomDesc', 'Occupancy', 'image_path', 'Status',
    ];

    public function rooms()
    {
        return $this->hasMany(TblRoom::class, 'RoomType', 'RoomType');
    }
}