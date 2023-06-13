<?php

use App\Http\Controllers\AddValueController;
use App\Http\Controllers\CalculatingValueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;

// Auth::routes();
// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/items', [ItemsController::class, 'index'])->name('items');
Route::post('/item/{item}/value', [ItemsController::class, 'updateValue'])->name('item.value.update');
Route::get('/item/{id}', [ItemsController::class, 'show'])->name('item.show');
Route::get('/calculator', [CalculatingValueController::class, 'index'])->name('calculator.index');
Route::get('/addItem/value', [AddValueController::class, 'index'])->name('addvalue.index');
