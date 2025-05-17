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
        Schema::create('product_images', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedInteger('line_item_no');
            $table->string('image_url')->nullable();
            $table->timestamps();

            $table->primary(['id', 'line_item_no']);
            $table->unique(['id', 'line_item_no'], 'product_images_id_line_item_no_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
