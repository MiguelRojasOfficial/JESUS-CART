<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>{{ $title ?? 'panel de Administración' }}</title>
	@vite(['resources/css/main.css', 'resources/js/app.js'])
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="flex bg-gray-100 min-h-screen">
	<header class="w-60 bg-white shadown-md h-full">
		<div class="p-5 text-xl font-bold border-b">Admin</div>
			<nav class="p-5 space-y-2">
				<a href="{{ route('admin.orders.index') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Órdenes</a>
				<a href="{{ route('products.index') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Productos</a>
				<a href="{{ route('categories.index') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Categorías</a>
				<a href="{{ route('suppliers.index') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Proveedores</a>
				<a href="{{ route('inventory.index') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Inventario</a>
				<a href="{{ route('admin.settings.edit') }}" class="block px-3 py-1 hover:bg-gray-200 rounded">Configuración</a>
				<form action="{{ route('logout') }}" method="POST" class="flex justify-center py-5">
					@csrf
					<button type="submit" class="text-red-500 p-3 border hover:bg-red-500 hover:text-white rounded">Cerrar sesión</button>
				</form>
			</nav>
		</div>
	</header>

	<main class="flex-grow">
		{{ $slot }}
	</main>

	<footer>

	</footer>
</body>
</html>