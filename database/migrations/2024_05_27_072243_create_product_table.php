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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('codeproduct', 100)->unique();
            $table->string('name', 100);
            $table->double('sellingprice')->nullable();
            $table->double('purchaseprice')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('category_id');
            $table->double('weight', 15, 8)->nullable();
            $table->double('carat', 15, 8)->nullable();
            $table->string('image', 100)->nullable();
            $table->integer('status')->default(2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
