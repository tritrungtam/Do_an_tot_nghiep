<?php

namespace Database\Seeders;
use App\Models\Sanpham;
use Illuminate\Database\Seeder;

class SanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sanpham::create([
          
          
            'tensp'=>'iPhone 14 | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'anhbia'=>'2.jpg',
            'anhsanpham'=>'2.jpg',
            'trangthai'=>'1',

        ]);
        Sanpham::create([
           
           
            'tensp'=>'iPhone 14 Pro | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'3.jpg',
            'anhsanpham'=>'4.jpg',
            
        ]);
        Sanpham::create([
          
            'tensp'=>'iPhone 14 Pro Max | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'5.jpg',
            'anhsanpham'=>'6.jpg',
            
        ]);
        Sanpham::create([
            
            'tensp'=>'iPhone 15 | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'7.jpg',
            'anhsanpham'=>'8.jpg',
            
        ]);
        Sanpham::create([
          
            'tensp'=>'iPhone 15 Pro | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'9.jpg',
            'anhsanpham'=>'10.jpg',
            
        ]);
        Sanpham::create([
           
            'tensp'=>'iPhone 15 Pro Max | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'11.jpg',
            'anhsanpham'=>'12.jpg',
            
        ]);
        Sanpham::create([
           
            'tensp'=>'iPhone 13 | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'13.jpg',
            'anhsanpham'=>'14.jpg',
            
        ]);
        Sanpham::create([
           
            'tensp'=>'iPhone 13 Pro | Chính hãng VN/A',
            'thuonghieu'=>'Apple',
            'trangthai'=>'1',
            'anhbia'=>'14.jpg',
            'anhsanpham'=>'12.jpg',
        ]);
    }
}

