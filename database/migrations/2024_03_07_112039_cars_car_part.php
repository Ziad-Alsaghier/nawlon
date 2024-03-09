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
        //this Pivot table Cause Can choose More car Part From Car
         Schema::create('cars_car_part', function (Blueprint $table) {
         $table->id();
         $table->foreignId('car_id')->constrained();
         $table->foreignId('car_part_id')->constrained();
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
        //
    }
};
