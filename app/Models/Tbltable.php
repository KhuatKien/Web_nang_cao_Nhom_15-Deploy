<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbltable extends Model
{
    use HasFactory;

    // Nếu tên bảng không phải là số nhiều của tên model, bạn cần chỉ định tên bảng:
    protected $table = 'tbltable';

    // Nếu khóa chính không phải là 'id', chỉ định khóa chính:
    protected $primaryKey = 'TableID';

    // Nếu khóa chính không tự động tăng, đặt thuộc tính này thành false:
    public $incrementing = false;

    // Chỉ định kiểu dữ liệu cho khóa chính nếu cần:
    protected $keyType = 'string';

    // Tùy chọn: Nếu bạn không muốn Laravel tự động quản lý các trường `created_at` và `updated_at`, thêm:
    public $timestamps = false;

    // Chỉ định các thuộc tính có thể được gán giá trị hàng loạt:
    protected $fillable = [
        'TableID',
        'Occupancy',
        'TableStatus'
    ];

    public function bookRes()
    {
        return $this->hasMany(TblBookRes::class, 'TableID', 'TableID');
    }
}
