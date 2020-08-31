@extends('layouts.app')
@section('content')
<label>chegou na index Produto</label>
<table class="table table-striped">
	<a  href="{{route('admin.products.create')}}" class="btn btn-sm btn-success" style="margin-top: 1rem; margin-left: 1rem;margin-bottom: 1rem;">Criar Produto para loja</a>
	<thead>
		<tr>
			<th>#</th>
			<th>Nome<th>
			<th>Preço<th>
			<th>Loja</th>
			<th>Açoês<th>
		</tr>
	</thead>
	<tbody>	
		@foreach($products as $p)
		<tr>
			<td>{{$p->id}}<td>
			<td>{{$p->name}}<td>
			<td>R$ {{number_format($p->price, 2,',','.')}}</td>
			<td>{{$p->store->name}}</td>
			<div class="btn-group">
				<td>
					<!-- CRIANDO LINK PARA ACESSAR VIEW-->
					<a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-default">Editar</a>
					
					<form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="post" >
							@csrf
							@method("DELETE")
							<button type="submit" class="btn btn-danger">Remover</button>
					</form>
				</td>
			</div>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection