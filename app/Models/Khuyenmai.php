<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'tenkm',
        'mota',

        'phantram',
        'ngaybatdau',
        'ngayketthuc',
        'trangthai'

       
    ];
}
