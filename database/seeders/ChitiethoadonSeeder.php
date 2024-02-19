<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChitiethoadonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        chitiethoadon::create([
            'mahd'=>'d01',
            'maspr'=>'r01',
            'soluong'=>'2',
            'dongia'=>'12000000',
            'tienkm'=>'23760000',
            'thanhtien'=>'đen',
            'iemi'=>'123456789'
        ]);
    }
}
