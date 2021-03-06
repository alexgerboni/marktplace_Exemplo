<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
	protected  $fillable = ['image'];
   	protected $table     = 'product_photos';
   	public function product(){
   	return $this->belongsTo(Products::class);
   }
}
