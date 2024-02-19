<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietspchungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietspchungs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('masp');
          
            $table->string('ktmanhinh')->nullable();
            $table->string('cnmanhinh')->nullable();
            $table->string('dophangiai')->nullable();
            $table->string('tinhnangmanhinh')->nullable();
            $table->string('tansoquet')->nullable();
            $table->string('mota')->nullable();
            $table->string('camerasau')->nullable();
        
            $table->string('quayvideo')->nullable();
            $table->string('cameratruoc')->nullable();
        
            $table->string('quayvideotruoc')->nullable();
          
            $table->string('thesim')->nullable();
            $table->string('hedieuhanh')->nullable();
           
            $table->string('hotromang')->nullable();
            $table->string('wifi')->nullable();
            $table->string('gps')->nullable();
           
            $table->string('kichthuoc')->nullable();
            $table->string('trongluong')->nullable();
          
            $table->string('congsac')->nullable();
            $table->string('pin')->nullable();
          
            $table->date('thoidiemramat')->nullable();
            $table->string('chipset')->nullable();
            
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->timestamps();
            $table->foreign('masp')->references('id')->on('sanphams');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietspchungs');
    }
}
