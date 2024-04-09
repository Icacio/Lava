<x-layout>
	<form method="post"> @csrf
		<label for="titulo">Titulo</label><br>
		<input type="te"
			name="titulo"
			id = "titulo"
			value="{{$titulo??(is_array(old($titulo))?"":old($titulo))}}"
			required>
		@error("titulo")
			<p class="text-red-500 text-xs mt-1"> {{$message}}</p>
		@else
			<br>
			<br>
		@enderror
		<label for="contenido">
			Contenido
		</label><br>
		<textarea id="contenido" class="text" cols="86" rows ="20" name="contenido">
			{{$post??(is_array(old($post))?"":old($post))}}
		</textarea>
		<button>Enviar</button>
	</form>
</x-layout>
