<x-layout>
	<div class="container mx-auto px-5 py-6">
		<a href="{{ route('home') }}" class="inline-flex items-center text-red-500 mb-5">&larr; Regresar a la tienda</a>
		<h2 class="text-2xl font-bold mb-4">Revisar pedido</h2>

		<form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
			@csrf
			<input type="text" name="coupon_code" placeholder="Codigo de cupón (opcional)" class="w-full border p-2 rounded">
			<button class="bg-green-500 text-white px-6 py-3 rounded">Pagar con Stripe</button>
		</form>
	</div>
</x-layout>