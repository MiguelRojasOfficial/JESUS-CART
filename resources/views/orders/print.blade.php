<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pedido #{{ $order->id }}</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
	<style>
		@media print {
			.no-print {
				display: none;
			}
		}
	</style>
</head>
<body class="p-8 text-sm">
	<div class="max-w-4xl mx-auto bg-white border p-6 shadow">
		<h1 class="text-2xl font-bold mb-4">Detalle del Pedido #{{ $order->id }}</h1>

		<p><strong>Cliente:</strong> {{ $order->user->name }}</p>
		<p><strong>Email:</strong> {{ $order->user->email }}</p>
		<p><strong>Fecha:</strong> {{ $order->create_at->format('Y-m-d H:i') }}</p>
		<p><strong>Estado:</strong> {{ $order->status }}</p>

		<hr class="my-4">

		<h2 class="text-lg font-semibold mb-2">Productos</h2>

		<table class="w-full border text-left mb-4">
			<thead>
				<tr>
					<th class="border px-3 py-1">Producto</th>
					<th class="border px-3 py-1">Cantidad</th>
					<th class="border px-3 py-1">Precio</th>
					<th class="border px-3 py-1">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->items as $item)
				<tr>
					<td class="border px-3 py-1">{{ $item->product->name }}</td>
					<td class="border px-3 py-1">{{ $item->quantity }}</td>
					<td class="border px-3 py-1">{{ number_format($item->price, 2) }}</td>
					<td class="border px-3 py-1">$ {{ number_format($item->price * $item->quantity, 2) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<p class="text-right font-bold text-lg">Total: $ {{ number_format($order->total, 2) }}</p>

		<div class="mt-4 text-center no-print">
			<button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Imprimir</button>
		</div>
	</div>
</body>
</html>