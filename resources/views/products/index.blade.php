<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<div class="flex items-center justify-between mb-4">
			<h2 class="text-2xl font-bold">Lista de productos</h2>
			<a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-5 py-2">Agregar producto</a>
		</div>

		<table class="min-w-full bg-white shadow rounded">
			<thead>
				<tr>
					<th class="px-5 py-2 border">Nombre</th>
					<th class="px-5 py-2 border">Precio</th>
					<th class="px-5 py-2 border">Stock</th>
					<th class="px-5 py-2 border">Imagen</th>
					<th class="px-5 py-2 border">Acciones</th>
				</tr>	
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td class="px-5 py-2 border">{{ $product->name }}</td>
					<td class="px-5 py-2 border">$ {{ number_format($product->price, 2) }}</td>
					<td class="px-5 py-2 border">{{ $product->stock }}</td>
					<td class="px-5 py-2 border">
						@if($product->image)
							<img src="{{ asset('storage/'.$product->image) }}" alt="img" class="w-15 h-15 object-cover">
						@else
							Sin imagen
						@endif
					</td>
					<td class="px-5 py-2 border space-x-2">
						<a href="{{ route('products.edit', $product) }}" class="text-blue-600">Editar</a>
						<form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Desea eliminar este producto?');">
							@csrf
							@method('DELETE')
							<button class="text-red-500">Eliminar</button>
						</form>

						@auth
							@if(auth()->user()->role?->name !== 'admin')
								<form action="{{ route('wishlist.store', $product) }}" method="POST">
									@csrf
									<button type="submit" class="text-red-500">Agregar a favoritos</button>
								</form>
							@endif
						@endauth
					</td>
				</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
</x-dashboard>