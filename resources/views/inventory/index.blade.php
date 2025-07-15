<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<div class="flex items-center justify-between mb-4">
			<h2 class="text-2xl font-bold">Movimientos de Inventario</h2>
			<a href="{{ route('inventory.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Movimiento</a>
		</div>

		<table class="min-w-full bg-white shadow rounded">
			<thead>
				<tr>
					<th class="px-4 py-2 border">Producto</th>
					<th class="px-4 py-2 border">Tipo</th>
					<th class="px-4 py-2 border">Cantidad</th>
					<th class="px-4 py-2 border">Motivo</th>
					<th class="px-4 py-2 border">Fecha</th>
				</tr>
			</thead>
			<tbody>
				@foreach($inventories as $inv)
				<tr>
					<td class="px-4 py-2 border">{{ $inv->product->name }}</td>
					<td class="px-4 py-2 border">
						<span class="{{ $inv->type === 'entrada' ? 'text-green-600' : 'text-red-600' }}" >{{ ucfirst($inv->type) }}</span>
					</td>
					<td class="px-4 py-2 border">{{ $inv->quantity }}</td>
					<td class="px-4 py-2 border">{{ $inv->reason }}</td>
					<td class="px-4 py-2 border">{{ $inv->created_at->format('d/m/Y H:i') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</x-dashboard>