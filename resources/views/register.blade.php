<x-layout>
	<div class="gap-6 lg:grid-cols-2 lg:gap-8">
		<div class="relative flex items-center gap-6 lg:items-end">
		<h2 class="text-xl font-semibold text-black dark:text-white">Iniciar sesión</h2>
			<p class="mt-4 text-sm/relaxed">
				<form method="post"> @csrf
					<x-campo campo='name'>
						Nombre de usuario
					</x-campo>
					<x-campo campo='email' type='email'>
						Email
					</x-campo>
					<x-campo campo='password' type='password'>
						Contraseña
					</x-campo>
					<x-next/>
				</form>
			</p>
		</div>
	</div>
</x-layout>