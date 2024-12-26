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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('barang_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->integer('sub_total')->default(0);
            $table->string('status');
            $table->string('payment_method')->nullable(); // tf, cod
            $table->string('payment_status')->nullable(); // paid, unpaid
            $table->string('shipping_method')->nullable(); // jne, jnt, pos
            $table->string('shipping_price')->default(0);
            $table->integer('total')->default(0);
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
