<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotizacionController;

// Ruta para guardar cotizaciones
Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');

// Página principal
Route::get('/', function () {
    return view('Pagina.PaginaRG');
})->name('home');

// Pagina Productos
Route::get('/productos', function () {
    return view('Pagina.Productos');
})->name('Productos');

// Pagina Que Hacemos?
Route::get('/que-hacemos', function () {
    return view('Pagina.QueHacemos');
})->name('que-hacemos');

// Pagina Quienes Somos
Route::get('/somos', function () {
    return view('Pagina.Somos');
})->name('Somos');

// Pagina Contactanos
Route::get('/contactanos', function () {
    return view('Pagina.Contactanos');
})->name('contactanos');
