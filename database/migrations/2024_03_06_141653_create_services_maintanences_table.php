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
        Schema::create('services_maintanences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('maintenance_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->longText('servicesTitle');
            $table->longText('servicesPrice');
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
        Schema::dropIfExists('services_maintanences');
    }
};
