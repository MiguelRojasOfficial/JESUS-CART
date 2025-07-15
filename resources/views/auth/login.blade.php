<x-layout>
	<div class="flex items-center justify-center min-h-159 bg-gray-100">
		<div class="bg-white shadow-md rounded-xl w-full max-w-md p-8 space-y-5">
			<form method="POST" action="{{ route('login') }}" class="space-y-5 flex flex-col items-center">
				@csrf
				<h2 class="text-2xl font-semibold text-center text-gray-600">Iniciar sesión</h2>
				<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="password" name="password" placeholder="Contraseña" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">

				<div class="flex items-center justify-between w-full text-sm">
					<div class="flex items-center gap-2">
						<input type="checkbox" name="remember" id="remember" class="accent-red-500">
						<label for="remember" class="text-gray-600">Recordarme</label>
					</div>
					<a href="#" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
				</div>

				<button type="submit" class="relative px-7 py-2 text-red-600 text-center font-semibold bg-white rounded-md overflow-hidden stroke-button">
					<span class="relative z-10">Iniciar Sesion</span>
				</button>
			</form>

			<p class="text-center text-sm text-gray-600">¿No tienes cuenta?<a href="{{ route('register') }}" class="text-blue-600 hover:underline"> Registrarse</a></p>
		</div>
	</div>
</x-layout>