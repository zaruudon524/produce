<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('living');
            $table->text('livingplace');
            $table->string('gender');
            $table->string('age');
            $table->string('havecome');
            $table->string('reasoncoming');
            $table->string('transportation');
            $table->string('howknow');
            $table->string('comeagain');
            $table->text('comeagainform');
            $table->text('image');
            $table->string('reasonnotcoming');
            $table->text('reasonnotcomingform');
            $table->text('option');
            $table->integer('museum_id');
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
        Schema::dropIfExists('surveys');
    }
}
