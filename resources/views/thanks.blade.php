@extends('layouts.front')

@section('content')

	<h1 class="alert alert-success">
		Muito obrigado por sua compra!
	</h1>
	<h4>
		seu pedido foi processado com sucesso, e seu código é: {{request()->get('order')}}.
	</h4>

@endsection