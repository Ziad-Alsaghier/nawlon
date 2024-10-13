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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
                 $table->string('cars_name');
                 $table->string('brand');
                 $table->string('image');
                 $table->string('car_type');
                 $table->integer('car_number');
                 $table->string('car_text');
            $table->enum('status', ['0','1','2']);
                 $table->foreignId('category_id')->
                 constrained()
                 ->onUpdate('cascade')->
                 onDelete('cascade'); // Foreign Conect With Category

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('cars');
    }
};
