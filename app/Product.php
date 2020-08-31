<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
  // use HasSlug;
	
   protected $fillable = ['name', 'description','body', 'price', 'slug'];
   protected $table = 'product';

   public function store(){
   	//e este prosutos pertencera a loja
   	return $this->belongsTo(Store::class);
   }
   //categories na verdada é categorias
   public function categories(){
   	//belongsToMany muito com quem 
   		return $this->belongsToMany(Category::class);
   }

   public function photos(){
      return $this->hasMany(ProductPhoto::class);
   }
}
