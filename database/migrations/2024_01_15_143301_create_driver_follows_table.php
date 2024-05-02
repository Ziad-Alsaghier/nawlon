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
        Schema::create('driver_follows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_follow');
            $table->string('image');
            $table->string('image_procedures');
            $table->integer('salary');
            $table->string('address');
            $table->integer('phone');
             $table->enum('status', ['1', '0']);
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
        Schema::dropIfExists('driver_follows');
    }
};
