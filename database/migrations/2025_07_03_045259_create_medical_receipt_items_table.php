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
        Schema::create('medical_receipt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_receipt_id')->constrained()->onDelete('cascade');
            $table->string('keterangan');
            $table->decimal('harga_satuan', 10, 2);
            $table->integer('qty');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_receipt_items');
    }
};
