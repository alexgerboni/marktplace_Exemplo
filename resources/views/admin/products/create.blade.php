@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form method="post" action="{{route('admin.products.store')}}" style="padding-left: 1rem; padding-right: 1rem" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Criar Produto</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
			@error('name')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo nome</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
		@error('description')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo descrição o campo deve conter no minimo 10 caracteres</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<textarea name="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" value="{{old('body')}}"></textarea>
		@error('body')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo body</p>
			</div>
		@enderror
	</div>
	<div class="form-group">
		<label>Preço</label>
		<input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
		@error('price')
			<div class="invalid-feedback">
				<p style="color: red">existem errro no campo produto</p>
			</div>
		@enderror
	</div>

		<div class="form-group">
			<label>Categorias</label>
			<select name="categories[]" id="" class="form-group" multiple>
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}} </option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Fotos do produto</label>
			<input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
			@error('photos')
				<div class="invalid-feedback">
					{{$message}}
				</div>
			@enderror
		</div>
		
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-success">CRIAR PRODUTO</button>
	</div>
</form>
@endsection