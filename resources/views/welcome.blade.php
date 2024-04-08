<x-layout>
	<div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
		<x-bigpanel/>
		@foreach($posts as $post)
			<x-smallpanel :href='"post/".$post->id' :titulo='$post->titulo' :contenido='$post->contenido'>
				<img src="https://picsum.photos/200?random={{$post->id}}"/>
			</x-smallpanel>
		@endforeach
		
	</div>
</x-layout>