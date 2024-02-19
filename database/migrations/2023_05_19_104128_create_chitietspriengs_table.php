<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietspriengsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietspriengs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('masp');
            $table->integer('bonhotrong');
            $table->integer('ram');
            $table->integer('soluong');
            $table->bigInteger('gia');
            $table->string('mau');
            $table->foreign('masp')->references('id')->on('sanphams');
            $table->timestamps();
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
        Schema::dropIfExists('chitietspriengs');
    }
}
