<x-layout>
	<x-post :titulo="$titulo">
		{{$post}}
	</x-post>
	@if(request()->is('delete/*'))
		<form method="post" action="/delete">@csrf
		¿Estás seguro de que quieres borrar este post?
		<input id="postId" name="postId" type="hidden" value="{{$postId}}" />
		<button type="submit"><b>Sí</b></button> ||
		<a href="/post/{{substr(request()->path(),7)}}"><b>No</b></a></p>
	@endif
</x-layout>