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
         $table->id();
         $table->foreignId("product_id")->constrained()->onDelete("cascade");
         $table->string("url");
         $table->boolean("is_primary")->default(false);
         $table->timestamps();
         $table->unique(["product_id", "is_primary"], "unique_product_id_primary_image");

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
