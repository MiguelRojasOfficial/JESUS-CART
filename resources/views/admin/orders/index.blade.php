<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Pedidos</h2>

		<table class="min-w-full bg-white shadow rounded">
			<thead>
				<tr>
					<th class="px-4 py-2 border">#</th>
					<th class="px-4 py-2 border">Cliente</th>
					<th class="px-4 py-2 border">Total</th>
					<th class="px-4 py-2 border">Estado</th>
					<th class="px-4 py-2 border">Fecha</th>
					<th class="px-4 py-2 border">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
					<tr>
						<td class="px-4 py-2 border">{{ $order->id }}</td>
						<td class="px-4 py-2 border">{{ $order->user->name ?? 'N/A' }}</td>
						<td class="px-4 py-2 border">{{ number_format($order->total, 2) }}</td>
						<td class="px-4 py-2 border">{{ ucfirst($order->status) }}</td>
						<td class="px-4 py-2 border">{{ $order->created_at->format('d/m/Y') }}</td>
						<td class="px-4 py-2 border">
							<a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600">Ver</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="mt-4">
			{{ $orders->links() }}
		</div>
	</div>
</x-dashboard>