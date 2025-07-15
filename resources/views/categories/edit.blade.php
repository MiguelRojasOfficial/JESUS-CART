<x-layout>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Editar categoría</h2>

		<form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
			@csrf
			@method('PUT')
			<input type="text" name="name" value="{{ $category->name }}" class="w-full border p-2 rounded" required>
			<button class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
		</form>
	</div>
</x-layout>