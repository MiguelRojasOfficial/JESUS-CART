<x-layout>
	<div class="container mx-auto px-5 py-6">
		<a href="{{ route('home') }}" class="inline-flex items-center text-red-500 mb-5">&larr; Regresar a la tienda</a>
		<h2 class="text-2xl font-bold mb-4">Carrito de compras</h2>

		@if(empty($cart))
			<p>No hay productos en el carrito.</p>
		@else
			<table class="min-w-full bg-white shadow rounded mb-6">
				<thead>
					<tr>
						<th class="px-4 py-2 border">Producto</th>
						<th class="px-4 py-2 border">Precio</th>
						<th class="px-4 py-2 border">Cantidad</th>
						<th class="px-4 py-2 border">Total</th>
						<th class="px-4 py-2 border">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@php $total = 0; @endphp
					@foreach($cart as $id => $item)
					@php $total+= $item['price'] * $item['quantity']; @endphp
						<tr>
							<td class="px-4 py-2 border flex items-center space-x-2">
								@if($item['image'])
								<img src="{{ asset('storage/' . $item['image']) }}" class="h-12 w-12 object-cover">
								@endif
								<span>{{ $item['name'] }}</span>
							</td>
							<td class="px-4 py-2 border">$ {{ $item['price'] }}</td>
							<td class="px-4 py-2 border">
								<form action="{{ route('cart.update', $id) }}" method="POST">
									@csrf
									<input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-15 text-center border">
									<button class="ml-2 text-blue-500">Actualizar</button>
								</form>
							</td>
							<td class="px-4 py-2 border ">$ {{ $item['price'] }} * {{ $item['quantity'] }}</td>
							<td class="px-4 py-2 border">
								<form action="{{ route('cart.remove', $id) }}" method="POST">
									@csrf
									<button class="text-red-500">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-right text-lg font-bold">
				Total: $ {{ $total }}
			</div>

			<div class="flex justify-between mt-6">
				<form action="{{ route('cart.clear') }}" method="POST">
					@csrf
					<button class="bg-gray-300 px-4 py-2 rounded">Vaciar carrito</button>
				</form>

				<a href="{{ route('checkout.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">Proceder al pago</a>
			</div>
		@endif
	</div>
</x-layout>
