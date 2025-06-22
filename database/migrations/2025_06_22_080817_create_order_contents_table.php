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
        Schema::create('order_contents', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('variant_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_contents');
    }
};
