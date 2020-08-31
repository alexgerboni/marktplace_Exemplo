<form action="{{route('env')}}" method="post" enctype="multipar\form-data">
	@csrf
	<input type="text" name="name">
	<input type="email" name="email">
	<input type="password" name="password">
	<input type="submit" value="enviar">
</form>