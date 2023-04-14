<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
   use HasFactory;

   protected $fillable = [
      "product_id",
      "url",
      "is_primary"
   ];

   public function product()
   {
      return $this->belongsTo(Product::class);
   }

   public function setPrimary(bool $primary): void
   {
      if ($primary) {
         // Unset primary flag for all other images of this product
         ProductImage::where("product_id", $this->product_id)
            ->where("id", "<>", $this->id)
            ->update(["is_primary" => false]);
      }

      $this->is_primary = $primary;
      $this->save();
   }
}
