<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nawlones', function (Blueprint $table) {
            $table->id();
                        $table->string('tatek_location');
                        $table->integer('nawlone_price');
                        $table->integer('comsion_driver');
                        $table->integer('custody'); // 3ohda M3 Elswa2
                        $table->enum('status',['0','1']); 
                        $table->integer('solar'); // 
                        $table->foreignId('car_id')->constrained();
                          $table->foreignId('down_location_id')->constrained();
                          $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('nawlones');
    }
};
