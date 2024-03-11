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
        Schema::create('car_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->foreignId('product_category_id')->constrained();
             $table->foreignId('user_id')->constrained();
             $table->string('coverPhoto')->nullable();
             $table->string('image')->nullable();
             $table->string('code');
             $table->string('avg_car_part')->nullable();
             $table->string('location')->nullable();
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
        Schema::dropIfExists('car_parts');
    }
};
