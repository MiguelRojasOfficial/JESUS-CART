# 🛍️ E-commerce Profesional con Laravel 12, Tailwind CSS y Stripe

Plataforma de tienda en línea desarrollada con Laravel 12, Tailwind CSS y Stripe, lista para producción. Incluye gestión de productos, categorías, proveedores, inventario, pedidos, carrito, clientes, reseñas, wishlist y panel administrativo completo.

## 🚀 Tecnologías Utilizadas

- Laravel 12
- Tailwind CSS
- Stripe (pagos en línea)
- MySQL
- Livewire (opcional)
- FontAwesome
- Laravel Excel (para exportación)
- Blade Components

---

## 📦 Funcionalidades

### 🛍️ Tienda pública

- Vista de productos por categoría
- Página de producto con detalles
- Carrito de compras
- Registro / Login de clientes
- Checkout seguro con Stripe
- Historial de pedidos

### 🧾 Gestión de pedidos

- Panel de pedidos del cliente
- Panel de pedidos del administrador
- Cambio de estado (Pendiente, Procesando, Enviado, Cancelado)
- PDF imprimible del pedido
- Exportación de pedidos a Excel

### 👤 Gestión de usuarios

- Registro/Login
- Wishlist (favoritos)
- Reseñas de productos

### ⚙️ Panel de administración

- Dashboard con estadísticas
- CRUD de productos
- CRUD de categorías
- CRUD de proveedores
- CRUD de inventario
- Gestión de pedidos
- Configuración de parámetros de la tienda

---

## 📸 Capturas (opcional)

_Añadir aquí screenshots de tienda, carrito, dashboard, etc._

---

## 🧑‍💻 Instalación

```bash
git clone https://github.com/tuusuario/mi-ecommerce-laravel.git
cd mi-ecommerce-laravel
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
Configura tu .env con tu conexión a base de datos y las credenciales de Stripe:

env
Copiar
Editar
STRIPE_KEY=pk_test_xxxxxxxxxxxxx
STRIPE_SECRET=sk_test_xxxxxxxxxxxx
🧪 Comandos útiles
bash
Copiar
Editar
php artisan migrate:fresh --seed
php artisan serve
npm run dev
php artisan storage:link
📤 Despliegue (Deploy)
Soportado en Laravel Forge, Heroku, Vercel (con Laravel API), etc.

Asegúrate de tener configurado APP_URL, APP_ENV=production, APP_DEBUG=false

📄 Licencia
MIT - Libre para uso personal y comercial.

🙌 Agradecimientos
Inspirado por proyectos reales de e-commerce y mejores prácticas de Laravel.