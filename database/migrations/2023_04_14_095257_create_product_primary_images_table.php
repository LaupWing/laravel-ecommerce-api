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
      Schema::create('product_primary_images', function (Blueprint $table) {
         $table->id();
         $table->foreignId("product_id")->constrained()->onDelete("cascade");
         $table->foreignId("product_image_id")->constrained()->onDelete("cascade");
         $table->timestamps();
         $table->unique(["product_id", "image_id"]);
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('product_primary_images');
   }
};
