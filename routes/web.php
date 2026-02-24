<?php

use App\Http\Controllers\JKKPMainsController;
use App\Http\Controllers\CadanganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
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
    Route::post('/validatestep2', [CadanganController::class, 'validateStep2'])->name('pencadang.validatestep2');

    Route::get('/getaset', [CadanganController::class, 'getAset'])->name('pencadang.getaset');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.submit');

    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware('admin.auth')->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin');

        Route::get('/list', [AdminController::class, 'list'])
            ->name('admin.list');

        Route::get('/detail/{id}', [AdminController::class, 'detail'])
            ->name('admin.detail');

        Route::delete('/delete/{id}', [AdminController::class, 'delete'])
            ->name('admin.delete');

        // future routes
        // Route::get('/users', [AdminController::class, 'users']);
        // Route::get('/reports', [AdminController::class, 'reports']);

    });

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