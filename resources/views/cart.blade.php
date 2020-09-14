@extends('layouts.front')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Carrinho de compras</h2>
		<hr>
	</div>
	<div class="col-md-12">
			@if($cart)
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Preco</th>
						<th>Quantidade</th>
						<th>Subtotal</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
						@php $total = 0; @endphp
						@foreach($cart as $cart)
						<tr>
							<td>{{$cart['name']}}</td>
							<td> R$ {{number_format($cart['price'], 2, ',', '.')}}</td>
							@php
								$subtotal = $cart['price'] * $cart['amount'];
								$total += $subtotal;
							@endphp
							<td>{{$cart['amount']}}</td>
							<td> R$ {{number_format( $subtotal, 2,',', '.') }}</td>
							<td>
								<a href="{{route('cart.remove',['slug' => $cart['slug']] )}}" class="btn btn-sm btn-danger">Remover</a>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan= "3">Total</td>
							<td colspan= "4">R$ {{ number_format($total, '2', ',', '.') }}</td>
						</tr>
				</tbody>
			</table>
				<div class="col-md-12">
					<a href="{{route('checkout.index')}}" class="btn btn-lg btn-success pull-right">Concluir Compra</a>
					<a href="{{route('cart.cancel')}}" class="btn btn-lg btn-danger pull-left">Cancelar Compra</a>
				</div>
			@else
			<div class="alert alert-warning">Carrinho vazio..</div>
			@endif
	</div>
</div>
@endsection