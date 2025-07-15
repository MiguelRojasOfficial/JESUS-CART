<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<div class="flex items-center justify-between mb-4">
			<h2 class="text-2xl font-bold">Proveedores</h2>
			<a href="{{ route('suppliers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar proveedor</a>
		</div>

		<table class="min-w-full bg-white shadow rounded">
			<thead>
				<tr>
					<th class="px-4 py-2 border">Nombre</th>
					<th class="px-4 py-2 border">Correo</th>
					<th class="px-4 py-2 border">Telefono</th>
					<th class="px-4 py-2 border">Dirección</th>
					<th class="px-4 py-2 border">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($suppliers as $supplier)
				<tr>
					<td class="px-4 py-2 border">{{ $supplier->name }}</td>
					<td class="px-4 py-2 border">{{ $supplier->email }}</td>
					<td class="px-4 py-2 border">{{ $supplier->phone }}</td>
					<td class="px-4 py-2 border">{{ $supplier->address }}</td>
					<td class="px-4 py-2 space-x-2">
						<a href="{{ route('suppliers.edit', $supplier) }}" class="text-blue-500">Editar</a>
						<form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este proveedor?');">
							@csrf
							@method('DELETE')
							<button class="text-red-500">Eliminar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</x-dashboard>