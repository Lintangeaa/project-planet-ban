<?php

use App\Http\Controllers\MappingController;
use App\Http\Controllers\MappingGeneratorController;
use App\Http\Controllers\Masterbancontroller;
use App\Http\Controllers\Masterfisikcontroller;
use App\Http\Controllers\Mastermotorcontroller;
use App\Http\Controllers\Mastervirtualcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/form', function () {
    return view('pages.form');
});


Route::get('/mappingtools', 'App\Http\Controllers\Mastermotorcontroller@index');
Route::get('/mappingtools', 'App\Http\Controllers\Masterbancontroller@index');

Route::get('/stockvirtual', [Mastervirtualcontroller::class, 'index'])->name('stockvirtual.index');
Route::get('/stockvirtual/create', [Mastervirtualcontroller::class, 'create'])->name('stockvirtual.create');
Route::post('/stockvirtual/store', [Mastervirtualcontroller::class, 'store'])->name('stockvirtual.store');

Route::get('/mappingtools/search', 'App\Http\Controllers\Mastermotorcontroller@search');
Route::get('/mappingtools/search', 'App\Http\Controllers\Masterbancontroller@search');

Route::get('/fisik/create', 'App\Http\Controllers\Masterfisikcontroller@create');

Route::get('/stockfisik', [Masterfisikcontroller::class, 'index'])->name('stockfisik.index');
Route::delete('/stockfisik-delete/{id}', [Masterfisikcontroller::class, 'destroy'])->name('stockfisik.destroy');

Route::get('form', 'App\Http\Controllers\Masterfisikcontroller@create');
Route::post('insert-data', 'App\Http\Controllers\Masterfisikcontroller@store');
Route::get('insert-data', 'App\Http\Controllers\Masterbancontroller@index');


Route::get('/mapping-generator', [MappingGeneratorController::class, 'index'])->name('mapping-generator.index');

Route::post('/ban', [Masterbancontroller::class, 'store'])->name('bans.store');
Route::post('/ban-delete/{id}', [Masterbancontroller::class, 'destroy'])->name('bans.destroy');

Route::post('/motor', [Mastermotorcontroller::class, 'store'])->name('motors.store');
Route::post('/motors-delete/{id}', [Mastermotorcontroller::class, 'destroy'])->name('motors.destroy');




