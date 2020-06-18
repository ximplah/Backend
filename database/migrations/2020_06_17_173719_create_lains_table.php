<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lains', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->length(100);
            $table->integer('nominal')->length(25);
            $table->integer('jumlah')->length(11);
            $table->bigInteger('id_bq')->unsigned();
            $table->foreign('id_bq')->references('id')->on('bqs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lains');
    }
}
