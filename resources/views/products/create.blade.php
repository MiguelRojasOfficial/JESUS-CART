<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Nuevo Producto</h2>

		<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
			@csrf
			<input name="name" type="name" placeholder="Nombre" class="w-full border p-2 rounded" value="{{ old('name') }}">
			<textarea name="description" placeholder="Descripción" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
			<input name="price" type="number" step="0.01" placeholder="Precio" class="w-full border p-2 rounded" value="{{ old('price') }}">  
			<input name="stock" type="number" placeholder="Stock" class="w-full border p-2 rounded" value="{{ old('stock') }}">
			<input name="image" type="file" class="w-full border p-2 rounded">

			<button class="bg-red-500 text-white px-5 py-2 rounded">Guardar</button>
		</form>
	</div>
</x-dashboard>