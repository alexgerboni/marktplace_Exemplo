<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	public function index()
	{

		$cart = session()->has('cart')  ? session()->get('cart') : [];
		//dd($cart);
		return view('cart', compact('cart'));
	}
   
   public function add (Request $request)
   {
   
   	$product = $request->get('product');
   	//dd($product);

   	if(session()->has('cart')){		
   		session()->push('cart', $product);
   	}else{
   		$products[] =  $product;
   		session()->put('cart', $products);
   	}
   	flash('Produto Adicionado ao carrinho')->success();
   	return redirect()->route('product.single', ['slug' => $product['slug']]);
   }
}
