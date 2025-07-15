<x-layout>
	<div class="container mx-auto py-6">
		<h2 class="text-2xl font-bold mb-4">Mis favoritos</h2>

		@forelse($wishlist as $item)
			<div class="flex items-center justify-between border p-4 mb-2 rounded">
				<div>
					<h3 class="font-semibold">{{ $item->product->name }}</h3>
					<p>S/ {{ $item->product->price }}</p>
				</div>
				<form action="{{ route('wishlist.destroy', $item) }}" method="POST">
					@csrf
					@method('DELETE')
					<button class="text-red-600">Eliminar</button>
				</form>
			</div>
		@empty
			<p>No tienes productos en favoritos.</p>
		@endforelse	
	</div>
</x-layout>