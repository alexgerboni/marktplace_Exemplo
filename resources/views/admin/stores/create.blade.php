@extends('layouts.app')

@section('content')
<h1>Criar loja</h1>
<form method="post" action="{{route('admin.stores.store')}}" style="padding-left: 1rem; padding-right: 1rem" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label>Nome da Loja</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
		@error('name')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo nome</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input type="text" name="description" class="form-control @error('description') is-invalid @enderror"  value="{{old('description')}}">
		@error('description')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo descrição o campo deve conter no minimo 10 caracteres</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Telefone</label>
		<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{old('phone')}}">
		@error('phone')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo telefone fixo</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Celular watts</label>
		<input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{old('mobile_phone')}}">

		@error('mobile_phone')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo do celular </p>
			</div>
		@enderror
	</div>

	<div class="form-group">
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
			<input type="text" name="slug" class="form-group">
		</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">CRIAR LOJA</button>
	</div>
</form>
@endsection