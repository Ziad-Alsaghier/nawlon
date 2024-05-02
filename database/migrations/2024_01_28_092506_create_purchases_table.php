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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('car_part_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('supplier_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->integer('totalPrice');
            $table->integer('car_part_price');
            $table->integer('quantity');
            $table->string('imageInvoice');
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
        Schema::dropIfExists('purchases');
    }
};
