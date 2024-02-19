<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietspchung extends Model
{
    use HasFactory;
    protected $fillable = [
        'masp',
        'mota',
        'ktmanhinh',
        'cnmanhinh',       
        'dophangiai',
        'tinhnangmanhinh',
        'tansoquet',
        'camerasau',
        'quayvideo',
        'cameratruoc',        
        'quayvideotruoc',
        'thesim',
        'hedieuhanh',
        'hotromang',
        'wifi',
        'gps',      
        'kichthuoc',
        'trongluong',
        'congsac',
        'pin',
        'thoidiemramat',
        'chipset',       
        'cpu',
        'gpu',       
    ];
}
