<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieubaohanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieubaohanhs', function (Blueprint $table) {
        $table->id('id');
        $table->foreignId('maspr');
        $table->foreignId('masp');
        $table->string('hotenkh');
        $table->string('diachi');
        $table->date('ngaytaophieu');
        $table->string('tinhtrang');
        $table->string('imei');
        $table->timestamps();
        $table->softDeletes();
                
        $table->foreign('masp')->references('id')->on('sanphams');
        $table->foreign('maspr')->references('id')->on('chitietspriengs');
      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieubaohanhs');
    }
}
