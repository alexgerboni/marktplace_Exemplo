<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
   
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index()
    {   
        $product = $this->product->limit(8)->orderBy('id', 'DESC')->get();
       // dd($product);
        return view('welcome', compact('product'));
    }

    public function single($slug){
       $product = $this->product->whereSlug($slug)->first();
       return view('single', compact('product'));
    }
}
