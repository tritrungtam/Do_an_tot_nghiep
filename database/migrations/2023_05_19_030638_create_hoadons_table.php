<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadons', function (Blueprint $table) {
            $table->id('id');
           
            $table->foreignId('makh');
            $table->string('tenkh');
            $table->string('sdt')->nullable();
            $table->string('diachi')->nullable();
            $table->string('giamgia')->nullable();;
            $table->string('trangthaihd');
            $table->date('ngaylap');
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::dropIfExists('hoadons');
    }
}
