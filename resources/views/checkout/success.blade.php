<x-layout>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold text-green-600">¡Pago exitoso!</h2>
		<p>Tu número de pedido es #{{ $order->id }}</p>
		<a href="{{ route('home') }}" class="text-blue-500">Volver a la tienda</a>
	</div>
</x-layout>