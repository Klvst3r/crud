<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');

Route::post('/libro/store', [LibroController::class, 'store'])->name('libro.store');

Route::get('/libro/read', [LibroController::class, 'read'])->name('libro.read');

//Route::put('/libro/{id}', [LibroController::class, 'update'])->name('libro.update');
Route::put('/libro/{libro}', [LibroController::class, 'update'])->name('libro.update');