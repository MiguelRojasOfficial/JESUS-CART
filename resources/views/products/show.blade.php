<x-layout>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-2xl font-bold mb-4">{{ $product->name }}</h2>
		<p class="mb-2">Precio: $ {{ number_format($product->price, 2) }}</p>
		<p class="mb-4">Stock: {{ $product->stock }}</p>

		<div class="mt-6">
			<h3 class="text-xl font-bold mb-2">Reseñas</h3>

			@foreach($product->reviews as $review)
				<div class="border rounded p-4 mb-2">
					<div class="flex justify-between">
						<p class="font-semibold">{{ $review->user->name }}</p>
						<p class="text-yellow-600">{{ str_repeat('♣', $review->rating) }}</p>
					</div>
					<p>{{ $review->comment }}</p>
				</div>
			@endforeach
		</div>


		@auth
			<form action="{{ route('review.store', $product) }}" method="POST" class="mt-6 space-y-2">
				@csrf
				<label for="rating" class="block font-semibold">Calificación</label>
				<select name="rating" id="rating" required class="border rounded w-full p-2">
					<option value="">Seleccionar</option>
					@for($i = 5; $i >= 1; $i--)
						<option value="{{ $i }}">{{ $i }} estrella{{ $i > 1 ? 's' : '' }}</option>
					@endfor
				</select>

				<label for="comment" class="block font-semibold">Comentario</label>
				<textarea name="comment" id="comment" rows="3" class="border rounded w-full p-2" placeholder="Escribe tu opinión..."></textarea>

				<button class="bg-blue-600 text-white px-4 py-2 rounded">Enviar reseña</button>
			</form>
		@else
			<p class="mt-4 text-gray-600">Inicia sesión para dejar una reseña.</p>
		@endauth
	</div>
</x-layout>