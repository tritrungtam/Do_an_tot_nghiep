<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DanhgiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        danhgia::create([
            'madg'=>'g01',
            'masp'=>'a01',
            'tenkh'=>'Phan Minh Trí',
            'noidung'=>'okeokebaby',
            'ngay'=>'hon nay',
            'trangthai'=>'đã duyệt'
        ]);
    }
}
