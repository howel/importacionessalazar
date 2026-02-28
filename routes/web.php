<?php

use Illuminate\Support\Facades\Route;
// ESTAS LÍNEAS SON LAS QUE FALTAN:
use App\Livewire\Home;
use App\Livewire\Shop;

// Página de inicio
Route::get('/', Home::class)->name('home');

// Página de la tienda
Route::get('/tienda', Shop::class)->name('shop');
