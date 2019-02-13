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
            $table->string('classification');
            $table->string('name')->unique();
            $table->date('creationDate');
            $table->string('acronym');
            $table->string('email')->unique();
            $table->string('website');
            $table->text('objective');
            $table->text('mision');
            $table->text('vision');
            $table->text('workplan');
            $table->integer('id_school')->unsigned();
            $table->integer('id_research_center')->unsigned();
            $table->foreign('id_school')->references('id')->on('schools');
            $table->foreign('id_research_center')->references('id')->on('research_centers');
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
