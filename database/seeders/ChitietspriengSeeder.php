<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChitietspriengSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        chitietsp::create([
            'maspr'=>'r01',
            'masp'=>'1',
            'bonhotrong'=>'okeokebaby',
            'soluong'=>'hon nay',
            'gia'=>'12000000',
            'mau'=>'đen'
        ]);
    }
}
