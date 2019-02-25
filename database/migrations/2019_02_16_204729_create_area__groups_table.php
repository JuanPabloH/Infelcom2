<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area__groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_area')->unsigned();
            $table->integer('id_group')->unsigned();
            $table->foreign('id_area')->references('id')->on('research_areas')->onDelete('cascade');
            $table->foreign('id_group')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('area__groups');
    }
}
