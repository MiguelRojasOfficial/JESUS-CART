<x-layout>
	<div class="container mx-auto px-5 py-6">
		<h1 class="text-3xl text-center font-bold mb-5">
			@if(request()->has('search') && request('search') !== '')
				Resultados para: "{{ request('search') }}"
			@else
				Bienvenido a nuestra tienda
			@endif
			</h1>

		<div class="grid grid-cols-2 md:grid-cols-5 gap-4 pt-5">
			@foreach($products as $product)
				<a href="{{ route('store.show', $product) }}" class="rounded overflow-hidden hover:shadow block">
					<div class="w-full h-51">
						<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
					</div>

					<div class="p-3 bg-white">
						<h2 class="text-sm text-gray-500">{{ $product->name }}</h2>

						<div class="flex items-center justify-between mt-1">
							<p class="text-green-600 font-semibold text-base">$ {{ number_format($product->price, 2) }}</p>
							<button class="text-gray-500 hover:text-red-500">
								<i class="fas fa-shopping-cart"></i>
							</button>
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
</x-layout>