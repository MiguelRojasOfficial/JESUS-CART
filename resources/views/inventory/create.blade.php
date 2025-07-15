<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Registrar movimiento</h2>

		<form action="{{ route('inventory.store') }}" method="POST" class="space-y-4">
			@csrf
			<select name="product_id" class="w-full border p-2 rounded" required>
				<option value="">
					Selecciona un producto
				</option>
				@foreach($products as $product)
				<option value="{{ $product->id }}">{{ $product->name }} (stock: {{ $product->stock }})</option>
				@endforeach
			</select>

			<select name="type" class="w-full border p-2 rounded" required>
				<option value="">Tipo de movimiento</option>
				<option value="entrada">Entrada</option>
				<option value="salida">Salida</option>
			</select>

			<input type="number" name="quantity" placeholder="Cantidad" class="w-full border p-2 rounded" required min="1">

			<textarea name="reason" placeholder="Motivo (opcional)" class="w-full border p-2 rounded"></textarea>

			<button class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
		</form>
	</div>
</x-dashboard>