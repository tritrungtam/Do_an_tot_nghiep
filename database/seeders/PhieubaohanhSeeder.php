<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhieubaohanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        phieubaohanh::create([
            'mabh'=>'b01',
            'maspr'=>'a001',
            'masp'=>'a01',
            'imei'=>'123456789',
        ]);
    }
}
