<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhgiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgias', function (Blueprint $table) {
            $table->id('id');
          
            $table->foreignId('masp');
            $table->foreignId('makh');
            $table->string('noidung');
            $table->timestamp('ngay');
            $table->string('trangthai');
            $table->timestamps();
            $table->foreign('masp')->references('id')->on('sanphams');
            $table->foreign('makh')->references('id')->on('taikhoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgias');
    }
}
