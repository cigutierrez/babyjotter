<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWetDiapers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wet_diapers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->string('type');
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
        Schema::dropIfExists('wet_diapers');
    }
}
