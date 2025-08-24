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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 100)->unique();
            $table->string('tracking_number', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->double('delivery_fee', 8, 2)->default(0);
            $table->double('coupon_discount', 8, 2)->default(0);
            $table->double('sub_total', 8, 2)->default(0);
            $table->double('grand_total', 8, 2)->default(0);
            $table->text('remark')->nullable();
            $table->string('status_code', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('slip', 255)->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
