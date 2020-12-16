<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_word', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('word_id');

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('word_id')->references('id')->on('words');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_word');
    }
}
