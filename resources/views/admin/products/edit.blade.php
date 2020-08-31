@extends('layouts.app')

@section('content')

		<label>Atulizar Produto</label>
<form method="post" action="{{route('admin.products.update', ['product' => $product->id])}}" style="padding-left: 1rem; padding-right: 1rem" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	<div class="form-group">
		<label><NOFRAMES></NOFRAMES> Produto</label>
		<input type="text" name="name" class="form-control" value="{{$product->name}}">
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input type="text" name="description" class="form-control" value="{{$product->description}}">
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<textarea name="body" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
	</div>
	<div class="form-group">
		<label>Preço</label>
		<input type="text" name="price" class="form-control" value="{{$product->price}}">
	</div>	
	
	<div class="form-group">
			<label>Categorias</label>
			<select name="categories[]" id="" class="form-group" multiple>
				@foreach($categories as $category)
					<option value="{{$category->id}}"
							@if($product->categories->contains($category)) selected @endif
						>
					
						{{$category->name}} </option>
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
		<input type="text" name="slug" class="form-control" value="{{$product->slug}}">
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Atualizar Produto</button>
	</div>
</form>
<div class="row">
	@foreach($product->photos as $photo)
		<div class="col-4">
			<img src="{{asset('storage/' . $photo->image)}}" alt="" class="img-fluid"> 	
			<form action="{{route('admin.photo.remove')}}" method="post">
				<input type="hidden" name="photoName" value="{{$photo->image}}">
				@csrf
				<button type="submit" class="btn btn-lg btn-danger">REMOVER</button>
			</form>

		</div>
		@endforeach
</div>
@endsection