<?php

use App\Http\Controllers\JKKPMainsController;
use App\Http\Controllers\CadanganController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
// return view('dashboard');
// })->name('dashboard');

// Route::get('/hello', function () {
//     return '<h1>Hello World</h1>';
// });
Route::get('/', function () {
    return redirect()->route('pencadang');
});

Route::prefix('pencadang')->group(function () {
    Route::get('/', [CadanganController::class, 'index'])->name('pencadang');
    Route::post('/store', [CadanganController::class, 'store'])->name('pencadang.store');
    Route::post('/validatestep1', [CadanganController::class, 'validateStep1'])->name('pencadang.validatestep1');
});


Route::prefix('jkkpmains')->group(function () {
    Route::get('/', [JKKPMainsController::class, 'index'])->name('jkkpmains');
    Route::get('/create', [JKKPMainsController::class, 'create'])->name('jkkpmains.create');
    Route::post('/store', [JKKPMainsController::class, 'store'])->name('jkkpmains.store');
    Route::any('/list', [JKKPMainsController::class, 'list'])->name('jkkpmains.list');
    Route::get('/edit/{id}', [JKKPMainsController::class, 'edit'])->name('jkkpmains.edit');
    Route::post('/update/{id}', [JKKPMainsController::class, 'update'])->name('jkkpmains.update');
    Route::delete('/destroy/{id}', [JKKPMainsController::class, 'destroy'])->name('jkkpmains.destroy');
});