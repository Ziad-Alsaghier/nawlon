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
        Schema::create('user_account_processes', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_accounts_id')->nullable(); // deposit Mony
           $table->float('money'); // deposit Mony
           $table->enum('process_type',['sale','withdraw','deposit']); // Recharge Wallet
           $table->enum('status',['accepted','pending' ,'rejected']);
           $table->timestamps();
           /*
           - withdraw => Recharg Wallet
           - Sale => Make New Signup
           - Deposit => User Need Take Some Mony
           */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_account_processes');
    }
};
