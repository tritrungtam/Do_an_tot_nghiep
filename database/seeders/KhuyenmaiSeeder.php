<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KhuyenmaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        khuyenmai::create([
            'makm'=>'m01',
            'tenkm'=>'Giảm giá 10% cho Khách hàng mới',
            'mota'=>'okeoke',
            'phantram'=>'10%',
            'trangthai'=>'đang áp dụng'
        ]);
    }
}
