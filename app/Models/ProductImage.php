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

   public function isPrimary(): bool
   {
      return $this->is_primary === true;
   }


   public function setPrimary(bool $primary): void
   {
      if ($this->is_primary === $primary) {
         return; // Image is already primary, nothing to do
      }

      if ($primary) {
         // Unset primary flag for all other images of this product
         $this->product->images()->where("is_primary", true)
            ->where("id", "<>", $this->id)
            ->update(["is_primary" => false]);
      }

      $this->is_primary = $primary;
      $this->save();
   }
}
