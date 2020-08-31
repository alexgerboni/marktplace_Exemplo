@extends('layouts.front')

@section('content')
    
   <h4 class="mb-4">Para acessar a area de login ou registrar
    <p> 
        <label>acessar login:</label>
        ex: http://localhost/marktplace/marktplace_16/public/login
    </p>

    <p>
         <label>acessar registrar:</label>
        ex: http://localhost/marktplace/marktplace_16/public/register
    </p>

   </h4>


    <div class="row">
        
        @foreach($product as $key => $product)
        
        <div class="col-md-4">
            
            <div class="card" style="width: 100%;">

                    @if($product->photos->count())
                        <img src="{{asset('storage/' . $product->photos->first()->image)}}" class="card-img-top">
                        @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img-top">
                    @endif

                <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text">
                    {{$product->description}}
                </p>

                <p>
                <h2> R$ {{number_format($product->price, 2,',','.')}}</h2>
                </p>

                <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">
                    ver produtos
                </a>
                </div>  

            </div>

        </div>
            @if(($key + 1) % 3 == 0)</div><div class="row front">@endif
        @endforeach


    </div>
@endsection