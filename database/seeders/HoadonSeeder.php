<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HoadonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        hoadon::create([
            'mahd'=>'d01',
            'manv'=>'v01',
            'makh'=>'h01',
            'tenkh'=>'Phan Minh Tri',
            'sdt'=>'0386774576',
            'diachi'=>'Viet Nam',
            'giamgia'=>'10%',
            'trangthai'=>'aa',
            'ngaylap'=>'21/5/2023',
        ]);
    }
}
