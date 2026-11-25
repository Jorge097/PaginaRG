<?php

use App\Http\Controllers\CotizacionController;
use Illuminate\Support\Facades\Route;

// Guardar cotizaciones (máx. 5 envíos por minuto por IP: anti-spam)
Route::post('/cotizaciones', [CotizacionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('cotizaciones.store');

Route::view('/', 'pages.inicio')->name('home');
Route::view('/productos', 'pages.productos')->name('Productos');
Route::view('/hacemos', 'pages.hacemos')->name('Hacemos');
Route::view('/somos', 'pages.somos')->name('Somos');

// La vista antigua de contacto no existía (daba 500): el formulario vive en el pie de cada página.
Route::redirect('/contactanos', '/#cotizar', 301)->name('contactanos');
