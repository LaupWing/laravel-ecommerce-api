<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   protected $fillable = ["name", "description", "price", "quanity"];

   public function store()
   {
      return $this->belongsTo(Store::class);
   }

   public function orders()
   {
      return $this->hasMany(Order::class);
   }

   public function product(){
      return $this->belongsTo(Product::class);
   }

   public function payment(){
      return $this->hasOne(Payment::class);
   }
}
