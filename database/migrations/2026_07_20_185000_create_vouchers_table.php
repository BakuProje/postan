<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type'); // discount_percent, discount_nominal, free_shipping, cashback
            $table->bigInteger('value');
            $table->string('description');
            $table->bigInteger('min_spend')->default(0);
            $table->bigInteger('max_discount')->default(0);
            $table->date('end_date');
            $table->boolean('is_active')->default(true);
            $table->integer('used_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
