<x-layout>
	<div class="container mx-auto px-5 py-8">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
			<div class="flex justify-end">
				<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-81 w-65 rounded shadow">
			</div>

			<div>
				<h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
				<p class="text-gray-700 mb-4">{{ $product->description }}</p>
				<p class="text-2xl text-green-600 font-semibold mb-6">$ {{ number_format($product->price, 2) }}</p>

				<form action="{{ route('cart.add', $product) }}" method="POST">
					@csrf
					<div class="mb-8">
						<label for="quantity" class="block mb-1 font-medium">Cantidad</label>
						<input type="number" name="quantity" id="quantity" value="1" min="1" class="border rounded p-2 w-24">
					</div>
					
					<div class="pt-8">
						<button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Agregar al carrito</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>