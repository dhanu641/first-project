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
        Schema::create('product_table', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('quantity');
            $table->string('category_id');
            $table->string('original_price');
            $table->string('selling_price');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_table');
    }
};
