<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotbedLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotbed__lines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_line')->unsigned();
            $table->integer('id_hotbed')->unsigned();
            $table->foreign('id_line')->references('id')->on('line_of_investigations')->onDelete('cascade');
            $table->foreign('id_hotbed')->references('id')->on('hotbeds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotbed__lines');
    }
}
