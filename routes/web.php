<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Middleware\RoleMiddleware;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\StoreController::class, 'index'])->name('home');
Route::get('/producto/{product}', [StoreController::class, 'show'])->name('store.show');
Route::get('/buscar', [StoreController::class, 'search'])->name('store.search');
Route::get('/carrito/', [CartController::class, 'index'])->name('cart.index');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('inventory', InventoryController::class)->except(['show', 'edit', 'update', 'destroy']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mis-pedidos', [OrderController::class, 'userOrders'])->name('orders.user');
    Route::get('/orders/export', [OrderController::class, 'exportExcel'])->name('orders.export');
    Route::get('/orders/{order}/download', [OrderController::class, 'download'])->name('orders.download');
    Route::get('/orders/{order}/print', [OrderController::class, 'print'])->name('orders.print');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderAdminController::class, 'show'])->name('admin.orders.show');
    Route::patch('/orders/{order}', [OrderAdminController::class, 'update'])->name('admin.orders.update');
});

Route::get('/admin/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
Route::post('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});