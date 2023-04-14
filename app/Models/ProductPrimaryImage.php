<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrimaryImage extends Model
{
   use HasFactory;

   protected $fillable = ["product_id", "product_image_id"];

   public function product() {
      return $this->belongsTo(Product::class);
   }

   public function productImage() {
      return $this->belongsTo(ProductImage::class);
   }
}
