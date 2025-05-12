<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecyclingMaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecyclingCenterController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\RewardController;

// Rutas de usuarios
Route::resource('users', UserController::class);

// Materiales reciclables
Route::get('/recycling-materials', [RecyclingMaterialController::class, 'index'])
    ->name('recycling.materials.index');

// Productos (CRUD completo)
Route::resource('products', ProductController::class);

// Autenticación
Auth::routes();

// Página principal
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Dashboard y rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Centros de reciclaje (CRUD completo)
    Route::resource('recycling-centers', RecyclingCenterController::class);

    // Publicaciones de la comunidad (CRUD completo)
    Route::resource('community-posts', CommunityPostController::class);

    // Premios (CRUD completo)
    Route::resource('rewards', RewardController::class);

    // Ruta extra para canjear premio
    Route::post('rewards/{reward}/redeem', [RewardController::class, 'redeem'])
        ->name('rewards.redeem');
});