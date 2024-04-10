<x-layout>
	<form method="post"> @csrf
		<x-campo campo="titulo" :b="$titulo">
			Titulo
		</x-campo>
		<label for="contenido">
			Contenido
		</label><br>
		<textarea id="contenido" class="text" cols="86" rows ="20" name="contenido">{{$contenido??old("contenido")}}</textarea>
		@error("contenido")
			<p class="text-red-500 text-xs mt-1"> {{$message}}</p>
		@enderror
		<button>Enviar</button>
	</form>
</x-layout>
