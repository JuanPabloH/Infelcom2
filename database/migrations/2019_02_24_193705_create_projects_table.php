<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('status');
            $table->text('objective');
            $table->date('startDate');
            $table->integer('duration');
            $table->text('sumary');
            $table->decimal('financing',12,0);
            $table->decimal('valueProject',12,0);
            $table->integer('id_line')->unsigned();
            $table->foreign('id_line')->references('id')->on('line_of_investigations')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
