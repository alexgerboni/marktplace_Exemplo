<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
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
}
