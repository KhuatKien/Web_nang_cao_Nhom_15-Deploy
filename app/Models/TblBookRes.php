<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBookRes extends Model
{
    protected $table = 'tblbookres';
    protected $primaryKey = 'BookID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'BookID', 'GuestID', 'TableID', 'BookDate', 'NumofPeople', 'StatusRes'
    ];

    public function guest()
    {
        return $this->belongsTo(TblGuest::class, 'GuestID', 'GuestID');
    }

    public function table()
    {
        return $this->belongsTo(TblTable::class, 'TableID', 'TableID');
    }
}
