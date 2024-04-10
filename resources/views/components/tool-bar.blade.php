@auth
<p>
	@unless(request()->is('profile'))
		<a href="/profile">Mis posts</a>
		@unless(request()->is('new'))
		 || 
		@endunless
	@endunless
	@unless(request()->is('new'))
		<a href="/new"><b>Crear</b> un nuevo Post</a>
	@endunless
	@if($propietario())
		|| <a href="/edit/{{$postId()}}">Editar post</a>
		|| <a href="/delete/{{$postId()}}">Borrar post</a>
	@endif
</p>
@endauth