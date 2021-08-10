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
            $table->bigIncrements('id');
            $table->char('name', 100);
            $table->char('place', 100);
            $table->text('body', 300);
            $table->text('address');
            $table->char('time', 100)->nullable();
            $table->char('day', 100)->nullable();
            $table->char('money', 100)->nullable();
            $table->char('traffic', 100)->nullable();
            $table->char('sns', 100)->nullable();
            $table->char('tel', 100)->nullable();
            $table->char('homepage', 100)->nullable();
            $table->char('other', 100)->nullable();
            
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
