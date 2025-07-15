<x-layout>
	<div class="flex items-center justify-center">
		<div class="bg-white shadow-md rounded-xl w-full max-w-md p-5">
			<form method="POST" action="{{ route('register') }}" class="space-y-5 flex flex-col items-center">
				@csrf
				<h2 class="text-2xl font-semibold text-center text-gray-600">Crear cuenta</h2>
				<input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="text" name="dni" placeholder="DNI" value="{{ old('dni') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="text" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="password" name="password" placeholder="Contraseña" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
				<div class="flex items-start gap-2 w-full text-sm text-gray-600">
					<input type="checkbox" name="autorizo" id="autorizo" class="mt-1 accent-red-500" required>
					<label for="autorizo" class="flex-1">Autorizo el
						<a href="#" class="text-blue-600 hover:underline"> tratamiento de mis datos personales</a>
					</label>
				</div>
				<div class="flex items-start gap-2 w-full text-sm text-gray-600">
					<input type="checkbox" name="leido" id="leido" class="mt-1 accent-red-500" required>
					<label for="leido" class="flex-1">He leído 
						<a href="#" class="text-blue-600 hover:underline">los términos y condiciones</a> y la 
						<a href="#" class="text-blue-600 hover:underline">politica de privacidad</a>
					</label>
				</div>
				<button type="submit" class="relative px-7 py-2 text-red-600 text-center font-semibold bg-white rounded-md overflow-hidden stroke-button">
					<span class="relative z-10">Registrarse</span>
				</button>
			</form>

			<p class="text-center text-sm text-gray-600">
				¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Iniciar sesión</a>
			</p>
		</div>
	</div>
</x-layout>