<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Editar proveedor</h2>

		<form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="space-y-4">
			@csrf
			@method('PUT')
			<input type="text" name="name" value="{{ $supplier->name }}" class="w-full border p-2 rounded" required>
			<input type="email" name="email" value="{{ $supplier->email }}" class="w-full border p-2 rounded">
			<input type="text" name="phone" value="{{ $supplier->phone }}" class="w-full border p-2 rounded">
			<input type="text" name="address" value="{{ $supplier->address }}" class="w-full border p-2 rounded">
			<button class="bg-blue-500 ext-white px-4 py-2 rounded">Actualizar</button>
		</form>
	</div>
</x-dashboard>
