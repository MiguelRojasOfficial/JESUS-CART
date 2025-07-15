<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<h2 class="text-xl font-bold mb-4">Configuración de la tienda</h2>

		@if(session('success'))
			<div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
		@endif

		<form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
			@csrf
			<div>
				<label class="block">Nombre de la tienda</label>
				<input type="text" name="shop_name" value="{{ \App\Models\Setting::get('shop_name') }}" class="w-full border p-2 rounded">
			</div>

			<div>
				<label class="block">Stripe Key</label>
				<input type="text" name="stripe_key" value="{{ \App\Models\Setting::get('stripe_key') }}" class="w-full border p-2 rounded">
			</div>

			<div>
				<label class="block">Stripe Secret</label>
				<input type="text" name="stripe_secret" value="{{ \App\Models\Setting::get('stripe_secret') }}" class="w-full border p-2 rounded">
			</div>

			<button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar cambios</button>
		</form>
	</div>
</x-dashboard>