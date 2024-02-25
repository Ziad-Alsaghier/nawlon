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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
  
            $table->string('license_number')->unique();
            $table->date('ex_date');
            $table->foreignId('car_id')->
            constrained()->on('cars')->
            references('id')->onDelete('cascade')
            ->onUpdate('cascade'); // Foreign Conect With car
            $table->string('image');
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
        Schema::dropIfExists('licenses');
    }
};
