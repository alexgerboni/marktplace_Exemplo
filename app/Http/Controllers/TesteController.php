<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(){

    	return view('teste');
    }
  	public function env(User $instan,Request $request){

  		$instan = new User();
      //$instan =  User::all();
      //dd($instan);
  		$instan->name = $request->name;
  		$instan->email = $request->email;
  		$instan->password = $request->password;
 		  $instan->save();
  		//dd($instan);
  		return 'e isso ar';
  	}
}
