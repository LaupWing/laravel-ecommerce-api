<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $product = Product::inRandomOrder()->first();
      $isPrimary = !ProductImage::where('product_id', $product->id)->exists();
      return [
         "product_id" => $product->id,
         "url" => fake()->imageUrl(),
         "is_primary" => $isPrimary
      ];
   }
}
