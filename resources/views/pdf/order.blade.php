<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<style>
		body { font-family: Dejavu Sans; }
		h2 { text-align: center;  }
		table { border-collapse: collapse; whidth: 100%;  }
		th, td {  border: 1px solid #000; padding: 8px; }	
	</style>
</head>
<body>
	<h2>Resumen del Pedido</h2>
	<p><strong>Número del Pedido:</strong> #{{ $order->id }}</p>
	<p><strong>Cliente:</strong> {{ $order->user->name }}</p>
	<p><strong>Total:</strong> $ {{ number_format($order->total, 2) }}</p>

	<h3>Productos:</h3>
	<table>
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order->products as $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->pivot->quantity }}</td>
				<td>$ {{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
