<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_files', function (Blueprint $table) {
            $table->id();
            $table->string('file')->length(100);
            $table->string('keterangan')->length(100);
            $table->bigInteger('id_tender')->unsigned();
            $table->foreign('id_tender')->references('id')->on('tenders')->onDelete('cascade');
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
        Schema::dropIfExists('input_files');
    }
}
