<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

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
                        $table->integer('nawlone_price');
                        $table->integer('comsion_driver');
                        $table->integer('custody'); // 3ohda M3 Elswa2
                        $table->enum('status',['0','1']); 
                        $table->integer('solar'); // 
                        $table->foreignId('car_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                        $table->foreignId('down_location_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade')->references('id')->on('down_locations')->
                            onDelete('cascade')->onUpdate('cascade');
                        // Can Be Null And Debend NameLocation
                        $table->string('location_name');// Debend Location Name Where (Location_id) Embty
                        $table->foreignId('location_tatek_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade')->references('id')->on('location_tateks');
                        // Can Be Null And Debend Name Location
                        $table->string('location_tatek_name'); // Debend Name Tatek Location Where (location_tatek_id) Embty 
                        $table->string('tatek_location');
                        $table->integer('returnedCustody')->nullable();
                        $table->integer('returnedSolar')->nullable();

                          $table->foreignId('user_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
                          $table->foreignId('driver_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
