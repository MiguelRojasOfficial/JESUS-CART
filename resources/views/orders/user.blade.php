<x-layout>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Mis Pedidos</h2>

		<a href="{{ route('orders.export') }}" class="bg-green-500 text-white px-4 py-2 rounded">Exportar a Excel</a>
		@forelse($orders as $order)
		<div class="border p-4 rounded mb-4 shadow">
			<div class="flex justify-between">
				<span class="font-semibold">Pedido #{{ $order->id }}</span>
				<span class="text-sm text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</span>
			</div>
			<div class="mt-2">
				<p>Total: 
					<strong>$ {{ number_format($order->total, 2) }}</strong>
				</p>
				<p>Estado: 
					<span class="px-3 py-1 rounded bg-gray-200">{{ ucfirst($order->status) }}</span>
				</p>
			</div>
		</div>
		@empty
		<p>no tienes pedidos aún.</p>
		@endforelse
	</div>
</x-layout>