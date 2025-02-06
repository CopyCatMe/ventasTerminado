<?php

use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\CategoryShow;
use App\Livewire\Home\Inicio;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\ProductShow;
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
