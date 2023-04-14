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
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("store_id")->constrained()->onDelete("cascade");
            $table->foreignId("product_id")->constrained()->onDelete("cascade");
            $table->enum("status", [
               "pending", 
               "processing", 
               "shipped", 
               "delivered", 
               "cancelled", 
               "refunded", 
               "returned", 
               "completed"
            ])->default("pending");
            $table->decimal("total_price", 10, 2);
            $table->integer("quantity");
            $table->timestamps();

            $table->unique(["user_id", "store_id", "product_id"]);
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
