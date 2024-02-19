<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaikhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoans', function (Blueprint $table) {
        $table->id('id');
        $table->string('taikhoan');
        $table->string('hoten')->nullable();;
        $table->string('email');
        $table->string('sdt')->nullable();;
        $table->string('diachi')->nullable();;
        $table->string('matkhau');
        $table->string('loaitk');
        $table->string('avatar')->nullable();
        $table->timestamps();
        $table->string('tokenmatkhau')->nullable();
        $table->rememberToken('remember_token');
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
        Schema::dropIfExists('taikhoans');
    }
}
