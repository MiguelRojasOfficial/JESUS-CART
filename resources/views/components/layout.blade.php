@props(['categories'])

@php
	$categories = $categories ?? [];
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Ecommerce')</title>
	@vite(['resources/css/main.css', 'resources/js/app.js'])
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
	<script src="https://kit.fontawesome.com/your_kit_id.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
	<header class="sticky top-0 z-50 bg-white shadow w-full">
		<nav class="max-w-7xl mx-auto flex items-center justify-between px-5 py-3">
			<div class="flex items-center space-x-4">
				<h1 class="text-2xl font-bold text-red-500">JESÚS</h1>
			</div>

			<div class="relative">
				<button id="toggleDropdown" class="text-gray-500 text-2xl focus:outline-none">
					<i class="fas fa-bars"></i>
				</button>

				<div id="dropdownMenu" class="hidden absolute left-0 mt-2 w-44 bg-white border rounded shadow z-60">
					@foreach($categories as $category)
						<a href="#" class="block px-4 py-2 hover:bg-gray-100">{{ $category->name }}</a>
					@endforeach
				</div>
			</div>

			<div class="hidden md:block w-1/3">
				<form action="{{ route('store.search') }}" method="GET">
					<div class="relative">
						<input type="text" name="search" placeholder="Buscar..." class="w-full border rounded-full px-4 py-2 pl-3 focus:outline-none focus:ring-2 focus:ring-gray-500">
						<button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</div>

			<div class="flex items-center space-x-4 text-xl text-gray-500">
				
				@auth
					<div class="relative">
						<button onclick="toggleMenu()" id="user-button" class="hover:text-red-500 flex items-center space-x-1 focus:outline-none">
							<i class="fas fa-user text-gray-500"></i>
							<i class="fas fa-chevron-down text-sm text-gray-500 ml-1"></i>
						</button>

						<div id="user-menu" class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg hidden z-50">
							<a href="{{ route('orders.user') }}" class="block px-5 py-1 text-sm text-gray-700 hover:bg-gray-100" onclick="closeMenu()">Mis pedidos</a>

							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<button type="submit" class="block w-full text-left px-5 py-3 text-sm text-gray-700 hover:bg-gray-100" onclick="closeMenu()">
									Cerrar sesión
								</button>
							</form>
						</div>
					</div>
				@else
					<a href="{{ route('login') }}" class="relative hover:text-red-500">
						<i class="fas fa-user"></i>
					</a>
				@endauth				
			</div>

			<div>
				<a href="{{ route('wishlist.index') }}" class="relative hover:text-red-500">
					<i class="fas fa-heart text-gray-500"></i>
					<span class="absolute -top-3 -right-5 bg-red-500 text-white text-xs rounded-full px-1">{{ session('wishlist') ? count(session('wishlist')) : 0 }}</span>
				</a>
			</div>

			<a href="{{ route('cart.index') }}" class="relative hover:text-red-500">
				<i class="fas fa-shopping-cart text-gray-500"></i>
				<span class="absolute -top-3 -right-5 bg-red-500 text-white text-xs rounded-full px-1">{{ session('cart') ? count(session('cart')) : 0 }}</span>
			</a>
		</nav>
	</header>
	<main class="flex-grow">
		{{ $slot }}
	</main>
	<footer class="bg-gray-800 text-white text-center mt-1">
		<div class="max-w-7xl mx-auto px-6 py-9 grid grid-cols-1 md:grid-cols-3 gap-8">
			<div>
				<h3 class="text-lg font-semibold mb-3">Atención al cliente</h3>
				<ul class="space-y-1 text-sm text-gray-300">
					<li><a href="#" class="hover:underline">Contáctanos</a></li>
					<li><a href="#" class="hover:underline">Preguntas frecuentes</a></li>
					<li><a href="#" class="hover:underline">Términos y condiciones</a></li>
				</ul>
			</div>

			<div>
				<h3 class="text-lg font-semibold mb-3">Sobre nosotros</h3>
				<ul class="space-y-1 text-sm text-gray-300">
					<li><a href="#" class="hover:underline">Quiénes somos</a></li>
					<li><a href="#" class="hover:underline">Nuestra misión</a></li>
					<li><a href="#" class="hover:underline">Blog</a></li>
				</ul>
			</div>

			<div>
				<h3 class="text-lg font-semibold mb-3">Redes Sociales</h3>
				<div class="space-x-5 text-xl">
					<a href="#" class="hover:text-blue-500">
						<i class="fab fa-facebook"></i>
					</a>
					<a href="#" class="hover:text-blue-400">
						<i class="fab fa-x"></i>
					</a>
					<a href="#" class="hover:text-blue-500">
						<i class="fab fa-instagram"></i>
					</a>
					<a href="#" class="hover:text-blue-600">
						<i class="fab fa-linkedin"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="bg-gray-900 text-center text-xl text-gray-500 py-5">
			Empowered by <span class="font-semibold text-white">JESÚS</span>
		</div>
	</footer>
</body>
</html>