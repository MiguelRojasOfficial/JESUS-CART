<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">Detalle del Pedido #{{ $order->id }}</h2>

		<p><strong>Cliente:</strong> {{ $order->user->name }}</p>
		<p><strong>Correo:</strong> {{ $order->user->email }}</p>
		<p><strong>Total:</strong> $ {{ number_format($order->total, 2) }}</p>
		<p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
		<p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H.i') }}</p>

		@if($order->coupon)
			<p><strong>Cupón:</strong> {{ $order->coupon->code }}</p>
			<p><strong>Descuento aplicado:</strong> -$ {{ number_format($order->coupon->calculateDiscount($order->total), 2) }}</p>
		@endif

		<form action="{{ route('admin.orders.update', $order) }}" method="POST" class="mt-4 space-y-2">
			@csrf
			@method('PATCH')

			<label for="status" class="block font-semibold">Cambiar estado:</label>
			<select name="status" id="status" class="border p-2 rounded">
				<option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
				<option value="procesado" {{ $order->status == 'procesado' ? 'selected' : '' }}>Procesado</option>
				<option value="enviado" {{ $order->status == 'enviado' ? 'selected' : '' }}>Enviado</option>
				<option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
				<option value="pagado" {{ $order->status == 'pagado' ? 'selected' : '' }}>Pagado</option>
			</select>

			<button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
		</form>
	</div>
</x-dashboard>