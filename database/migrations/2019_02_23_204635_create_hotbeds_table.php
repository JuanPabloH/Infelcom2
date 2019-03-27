<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotbedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotbeds', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('status');
            $table->text('objective');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('id_line')->unsigned();
            $table->foreign('id_line')->references('id')->on('line_of_investigations');
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
        Schema::dropIfExists('hotbeds');
    }
}
