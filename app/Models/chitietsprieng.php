<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsprieng extends Model
{
    use HasFactory;
    protected $fillable = [
        'masp',
        'maspr',
        'bonhotrong',

        'soluong',
        'ram',
        'gia',
        'mau',
    ];
}
