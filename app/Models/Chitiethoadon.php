<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiethoadon extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahd',
        'maspr',
        'soluong',

        'dongia',
        
        'phantramkm',
        'thanhtien',

        'imei',
        'thoigianbh',
        'ngaytao',
        'ngayhet',

       
    ];
}
