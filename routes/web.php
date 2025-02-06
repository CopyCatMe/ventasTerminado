<?php

use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\CategoryShow;
use App\Livewire\Client\ClientComponent;
use App\Livewire\Client\ClientShow;
use App\Livewire\Home\Inicio;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\ProductShow;
use App\Livewire\User\UserComponent;
use App\Livewire\User\UserShow;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para el inicio
Route::get('/inicio', Inicio::class)->name('inicio');

//Ruta para la categoria
Route::get('/categories', CategoryComponent::class)->name('categories');

//Ruta para ver la categoria (icono ojito)
Route::get('/categories/{category}', CategoryShow::class)->name('categories.show');

//Ruta para los productos
Route::get('/products', ProductComponent::class)->name('products');

//Ruta para ver los productos (icono ojito)
Route::get('/products/{product}', ProductShow::class)->name('products.show');

//Ruta para los usuarios
Route::get('/users', UserComponent::class)->name('users');

//Ruta para ver los usuario (icono ojito)
Route::get('/users/{user}', UserShow::class)->name('user.show');

//Ruta para los clientes
Route::get('/clients', ClientComponent::class)->name('clients');

//Ruta para ver los clientes (icono ojito)
Route::get('/clients/{client}', ClientShow::class)->name('client.show');