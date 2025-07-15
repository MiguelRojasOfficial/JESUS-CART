<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Editar producto</h2>

		<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
			@csrf
			@method('PUT')
			<input name="name" type="text" value="{{ old('name', $product->name) }}" class="w-full border p-2 rounded">
			<textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
			<input name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}" class="w-full border p-2 rounded">
			<input name="stock" type="number" value="{{ old('stock', $product->stock) }}" class="w-full border p-2 rounded">
			<input name="image" type="file" class="w-full border p-2 rounded">

			<button class="bg-blue-600 text-white px-5 py-2 rounded">Actualizar</button>
		</form>
	</div>
</x-dashboard>