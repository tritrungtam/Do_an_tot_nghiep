<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use  HasFactory;

    
    protected $fillable = [
        'masp',
        
        'tensp',
    
        'thuonghieu',
        'anhbia',
        'anhsanpham',
        'trangthai',
        
    ];

    public function chitietsprieng()
    {
        return $this->hasMany(chitietsprieng::class);
    }
}   
