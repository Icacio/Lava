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
	@if(request()->is('post/*'))
		@if($postId->user_id==auth()->user()->id)
		<a href="/edit/$id">Edit post</a>	
		@endif
	@endif
</p>
@endauth