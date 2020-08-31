@extends('layouts.front')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Carrinho de compras</h2>
		<hr>
	</div>
	<div class="col-md-12">
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
								$subtotal = $cart['price'] * $cart['amout'];
								$total += $subtotal;
							@endphp
							<td>{{$cart['amout']}}</td>
							<td> R$ {{number_format( $subtotal, 2,',', '.') }}</td>
							<td>
								<a href="" class="btn btn-sm btn-danger">Remover</a>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan= "3">Total</td>
							<td colspan= "4">R$ {{ number_format($total, '2', ',', '.') }}</td>
						</tr>
				</tbody>
			</table>
	</div>
</div>
@endsection