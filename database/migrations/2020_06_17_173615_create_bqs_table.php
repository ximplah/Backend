<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bqs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->length(100);
            $table->integer('nilai')->length(20);
            $table->string('instansi')->length(100);
            $table->char('lama_tender')->length(2);
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
        Schema::dropIfExists('bqs');
    }
}
