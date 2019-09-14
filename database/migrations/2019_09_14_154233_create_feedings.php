<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('baby_id');
            $table->string('type');
            $table->string('breast');
            // Take a look at:
            // https://dev.mysql.com/doc/refman/8.0/en/time.html
            // To understand how the time column works. The values need to be entered without colons, so 1130 is 11 min and 30 sec.
            $table->time('length');
            $table->decimal('amount', 4, 2);
            $table->string('measurement');
            
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
        Schema::dropIfExists('feedings');
    }
}
