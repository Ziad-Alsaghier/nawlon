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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driv_name');
            $table->string('id_number');
            $table->string('image');
            $table->string('image_procedures'); // Fesh we Tashbeh
            $table->string('salary'); // Fesh we Tashbeh
            $table->integer('comsium'); // 
            $table->string('address');
            $table->integer('phone');
            $table->string('license');
            $table->string('image_license');
             $table->enum('status', ['1', '0']);
            $table->date('ex_date');
             $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('drivers');
    }
};
