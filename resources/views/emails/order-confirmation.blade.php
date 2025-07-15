<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Confirmación de Pedido</title>
</head>
<body>
	<h2>¡Gracias por tu compra!</h2>
	<p>Número de pedido: <strong>#{{ $order->id }}</strong></p>
	<p>Total pagado: <strong>$ {{ number_format($order->total, 2) }}</strong></p>
	<h3>Resumen del pedido:</h3>
	<ul>
		@foreach($order->products as $product)
			<li>{{ $product->name }} (x{{ $product->pivot->quantity }})</li>
		@endforeach
	</ul>
	<p>Nos pondremos en contacto contigo pronto.</p>
</body>
</html>