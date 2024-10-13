<?php

use App\Models\Package;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\HasMany;
return new class extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void`
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');  
            $table->float('price_monthly');
            $table->float('price_year');
            $table->float('setup_fees');
            $table->integer('car_limitation');
            $table->enum('type',['free','paid']);  
          
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
        Schema::dropIfExists('packages');
        
    }
   

};
