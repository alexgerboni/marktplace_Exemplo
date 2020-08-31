@extends('layouts.app')

@section('content')
<h1>Criar loja</h1>
<form method="post" action="{{route('admin.stores.update',['store' => $store->id])}}" style="padding-left: 1rem; padding-right: 1rem" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	<div class="form-group">
		<label>Nome da Loja</label>
		<input type="text" name="name" class="form-control" value="{{$store->name}}">
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input type="text" name="description" class="form-control"  value="{{$store->description}}">
	</div>
	<div class="form-group">
		<label>Telefone</label>
		<input type="text" name="phone" class="form-control" value="{{$store->phone}}">
	</div>
	<div class="form-group">
		<label>Celular watts</label>
		<input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}"> 
	</div>

	<div class="form-group">
			<p>
				<img src="{{ asset('storage/'. $store->logo) }}">
			</p>
			<label>Fotos do produto</label>
			<input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
			@error('logo')
				<div class="invalid-feedback">
					{{$message}}
				</div>
			@enderror
	</div>
	
	<div class="form-group">
			<label>Slug</label>
			<input type="text" name="slug" class="form-control" value="{{$store->slug}}">
		</div>


	<div class="form-group">
		<button type="submit" class="btn btn-success">Atualizar LOJA</button>
	</div>
</form>
@endsection