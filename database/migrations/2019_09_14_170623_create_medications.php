<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->string('type');
            $table->string('name');
            $table->time('how_often');
            $table->integer('times_per_day');
            $table->decimal('amount', 4, 3);
            $table->string('measurement');
            $table->string('notes');
            
            $table->timestamps();

            $table->foreign('baby_id')->references('id')->on('babies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medications');
    }
}
