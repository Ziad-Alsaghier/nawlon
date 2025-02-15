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
        Schema::create('violation_cars', function (Blueprint $table) {
            $table->id();
               $table->string('violations');
               $table->foreignId('car_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
               $table->string('type');
               $table->string('violation_number');
               $table->string('violation_price');
               $table->string('violation_date');
                $table->foreignId('user_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('violation_cars');
    }
};
