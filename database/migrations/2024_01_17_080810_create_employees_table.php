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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
              $table->string('name');
              $table->integer('phone');
              $table->string('id_employee');
              $table->string('address');
              $table->string('image');
              $table->string('image_procedures');
              $table->string('salary');
               $table->enum('status', ['1', '0']);
              $table->foreignId('divide_id')->constrained();
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
        Schema::dropIfExists('employees');
    }
};
