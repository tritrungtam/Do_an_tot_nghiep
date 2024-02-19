<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaikhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        taikhoan::create([
            'matk'=>'c01',
            'tentk'=>'minhtri',
            'hoten'=>'Phan Minh Trí',
            'email'=>'phanminhtrimtp@gmail.com',
            'sdt'=>'0386774576',
            'diachi'=>'Viet Nam',
            'matkhau'=>'tritrungtam',
            'loaitk'=>'Admin',
        ]);
        taikhoan::create([
            'matk'=>'c02',
            'tentk'=>'minhtri1',
            'hoten'=>'Phan Minh Trí',
            'email'=>'phanminhtri1mtp@gmail.com',
            'sdt'=>'0386774576',
            'diachi'=>'Viet Nam',
            'matkhau'=>'tritrungtam1',
            'loaitk'=>'Khách hàng',
        ]);
    }
}
