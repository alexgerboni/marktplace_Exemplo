<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{	
   protected $fillable = ['store_id','reference', 'pagseguro_code', 'pagseguro_status', 'items'];
   protected $table = 'user_orders';

   public function user(){
   		
   		return $this->belegonTo(User::class);
   }

   public function store(){

   		return $this->belegonTo(Store::class);
   }

   public function stores(){
   	
   	return $this->belongsToMany(Store::class,'order_store', 'order_id');

   }
}
