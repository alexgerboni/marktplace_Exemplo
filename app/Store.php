<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Notifications\StoreReceiveNewOrder;
class Store extends Model
{

    protected $fillable =  ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];
    protected $table = 'store';
    //user sera o dono da loja entao essa loja pertencera a um usuario
    //este model store pertence ao modal user
    public function user(){
    return $this->belongsTo(User::class);
    }

    public function products(){
    	//hasmany ou seja tem muitos products para um
    	return $this->hasmany(Product::class);
    }

    
    public function orders(){
        
        return $this->belongsToMany(UserOrder::class, 'order_store',null, 'order_id');
    }

        public function notifyStoreOwners(array $storesId = []){

            //$stores = [1,2];

            $stores = $this->whereIn('id', $storesId)->get();

            $stores->map(function($store){

                return $store->user;

            })->each->notify(new StoreReceiveNewOrder());
        }
}
