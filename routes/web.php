<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MappingGeneratorController;
use App\Http\Controllers\MappingToolsController;
use App\Http\Controllers\Masterbancontroller;
use App\Http\Controllers\Masterfisikcontroller;
use App\Http\Controllers\Mastermotorcontroller;
use App\Http\Controllers\Mastervirtualcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/form', function () {
    return view('pages.form');
});

Route::get('/fisik/create', 'App\Http\Controllers\Masterfisikcontroller@create');

Route::get('/stockfisik', [Masterfisikcontroller::class, 'index'])->name('stockfisik.index');
Route::delete('/stockfisik-delete/{id}', [Masterfisikcontroller::class, 'destroy'])->name('stockfisik.destroy');

Route::get('form', 'App\Http\Controllers\Masterfisikcontroller@create');
Route::post('insert-data', 'App\Http\Controllers\Masterfisikcontroller@store');
Route::get('insert-data', 'App\Http\Controllers\Masterbancontroller@index');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/mapping-tools', [MappingToolsController::class, 'index'])->name('mapping-tools.index');

Route::prefix('/stockvirtual')->name('stockvirtual.')->group(function() {
    Route::get('', [Mastervirtualcontroller::class, 'index'])->name('index');
    Route::get('/create', [Mastervirtualcontroller::class, 'create'])->name('create');
    Route::post('/store', [Mastervirtualcontroller::class, 'store'])->name('store');
});

Route::prefix('/mapping-generator')->name('mapping-generator.')->group(function() {
    Route::get('', [MappingGeneratorController::class, 'index'])->name('index');
    Route::post('', [MappingGeneratorController::class, 'store'])->name('store');
});

Route::post('/ban', [Masterbancontroller::class, 'store'])->name('bans.store');
Route::post('/ban-delete/{id}', [Masterbancontroller::class, 'destroy'])->name('bans.destroy');

Route::post('/motor', [Mastermotorcontroller::class, 'store'])->name('motors.store');
Route::post('/motors-delete/{id}', [Mastermotorcontroller::class, 'destroy'])->name('motors.destroy');




