<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Agregar proveedor</h2>

		<form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
			@csrf
			<input type="text" name="name" placeholder="Nombre" class="w-full border p-2 rounded">
			<input type="email" name="email" placeholder="Correo" class="w-full border p-2 rounded">
			<input type="text" name="phone" placeholder="Telefono" class="w-full border p-2 rounded">
			<input type="text" name="address" placeholder="Dirección" class="w-full border p-2 rounded">
			<button class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
		</form>
	</div>
</x-dashboard>