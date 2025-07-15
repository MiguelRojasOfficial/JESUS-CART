<x-dashboard :categories="$categories">
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Agregar categoría</h2>

		<form action="{{ route('categories.store')}}" method="POST" class="space-y-4">
			@csrf
			<input type="text" name="name" placeholder="Nombre de categoría" class="w-full border p-2 rounded" required>
			<button class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
		</form>
	</div>
</x-dashboard>