<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotizacionController;

// Ruta para guardar cotizaciones
Route::post('/cotizaciones', [CotizacionController::class, 'store'])
    ->middleware('throttle:5,1') // máx. 5 envíos por minuto por IP (anti-spam)
    ->name('cotizaciones.store');

// Página principal
Route::get('/', function () {
    return view('Pagina.PaginaRG');
})->name('home');

// Pagina Productos
Route::get('/productos', function () {
    return view('Pagina.Productos');
})->name('Productos');

// Pagina Que Hacemos?
Route::get('/hacemos', function () {
    return view('Pagina.Hacemos');
})->name('Hacemos');

// Pagina Quienes Somos
Route::get('/somos', function () {
    return view('Pagina.Somos');
})->name('Somos');

// Pagina Contactanos
Route::get('/contactanos', function () {
    return view('Pagina.Contactanos');
})->name('contactanos');
