@extends('layouts.front')

@section('content')
    

    <div class="row">
    	
        	<div class="col-md-6">
        		
        		@if($product->photos->count())

        	   <div class="col">
        	   <img src="{{asset('storage/' . $product->photos->first()->image)}}" class="card-img-top">
        	   </div>

    		    <div class="row" style="margin-top: 20px;">
    		    	@foreach($product->photos as $photo)
    		    	 <div class="col-md-2">
    		    	 	<img src="{{asset('storage/' .$photo->image)}}" class="card-img-top img-fluid">
    		    	 </div>
    		    	 @endforeach
    		    </div>

    		    @else
    		    <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img-top">
    		    @endif

        	</div>


        <div class="col-md-6"> 

            <div class="col-md-12">
                
                <h2>{{$product->name}}</h2>

                <p>
                <h2>{{$product->description}}</h2>
                </p>
                <p>
                    <h2> R$ {{number_format($product->price, '2',',', '.')}}</h2>
                </p>
                
                <p>
                    <label>
                        
                        Loja: <p>{{$product->store->name}}</p>

                    </label>
                </p>    

            </div>

            <div class="product-add col-md-12">
                <hr>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="product[amount]" class="form-control col-md-2" value="1">
                        </div>
                        <button class="btn btn-lg btn-danger">Comprar produto</button>
                </form>
            </div>
        
        </div>

    </div>

    <div class="row">
    
    <h2>{{$product->body}}</h2>
    
    </div>
@endsection    