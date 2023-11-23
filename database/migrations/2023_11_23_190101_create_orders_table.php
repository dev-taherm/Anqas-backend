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
            $table->primary(['customer_id','Service_id' ]);
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('Service_id')->constrained()->onDelete('cascade');
            $table->string('titel');
            $table->string('descriptions');
            $table->string('price');
            $table->enum('status', ['draft', 'published', 'archived', 'waiting', 'booked', 'canceled_c', 'canceled_s']);
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
