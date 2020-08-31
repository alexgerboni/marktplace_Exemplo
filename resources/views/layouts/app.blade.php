<!DOCTYPE html>
<html>
<head>
	<title>Markt place</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">
	<a href="{{route('home')}}" class="navbar-brand">Marktplace L6</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
  		@auth
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
	        <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item @if(request()->is('admin/products*')) active @endif">
	        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
	      </li>
	      <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
	        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
	      </li>
	    </ul>
    <div class=" my-2 my-lg-0">
	      <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	      <a class="nav-link" href="#" onclick="event.preventDefault();document.querySelector('form.logout').submit();">Deslogar</a>
	       <form method="post" style="display: none;" action="{{route('logout')}}" class="logout">
	        	@csrf
	       </form>
	      </li>
	    </ul>
    </div>
    <li class="nav-item">
    	<span style="color: white">{{auth()->user()->name}}</span>
    </li>
    @endauth
  </div>
</nav>
	@include('flash::message')
	@yield('content')
</body>
</html>
