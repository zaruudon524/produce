<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuseumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museums', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('name', 100);
            $table->integer('place_id');
            $table->integer('body_id');
            $table->text('address');
            $table->char('time', 100)->nullable();
            $table->char('day', 100)->nullable();
            $table->char('money', 100)->nullable();
            $table->char('traffic', 100)->nullable();
            $table->char('sns', 100)->nullable();
            $table->char('tel', 100)->nullable();
            $table->char('homepage', 100)->nullable();
            $table->char('other', 100)->nullable();
            // $table->foreign('place_id')->references('id')->on('prefs');
            // $table->foreign('body_id')->references('id')->on('museumkinds');

            $table->softDeletes();
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
        Schema::dropIfExists('museums');
    }
}
