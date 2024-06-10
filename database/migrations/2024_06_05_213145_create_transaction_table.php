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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('customer_id');
            $table->date('purchase');
            $table->bigInteger('total');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
