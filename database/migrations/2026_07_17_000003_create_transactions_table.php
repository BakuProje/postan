<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('transaction_code')->unique();
            $table->bigInteger('total_price');
            $table->bigInteger('total_paid');
            $table->bigInteger('total_change');
            $table->string('payment_method')->default('cash');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
