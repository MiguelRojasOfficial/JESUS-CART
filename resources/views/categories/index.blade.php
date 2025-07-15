<x-dashboard>
	<div class="container mx-auto px-5 py-6">
		<div class="flex items-center justify-between mb-4">
			<h2 class="text-2xl font-bold">Categorías</h2>
			<a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar categoría</a>
		</div>

		<table class="min-w-full bg-white shadow rounded">
			<thead>
				<tr>
					<th class="px-4 py-2 border">Nombre</th>
					<th class="px-4 py-2 border">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td class="px-4 py-2 border">{{ $category->name }}</td>
					<td class="px-4 py-2 border space-x-2">
						<a href="{{ route('categories.edit', $category) }}" class="text-blue-500">Editar</a>
						<form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta categoría?');">
							@csrf
							@method('DELETE')
							<button class="text-red-500">Eliminar</button>
						</form>
					</td>
				</tr>
				@endforeach	
			</tbody>
		</table>
	</div>
</x-dashboard>