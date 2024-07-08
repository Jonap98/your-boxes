<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalogos\PartsController;
use App\Http\Controllers\Catalogos\LocationsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// =========================================================================
// Catalogs
// =========================================================================
// Parts
Route::get('parts/get', [ PartsController::class, 'index' ])->name('parts.index');
Route::post('parts/store', [ PartsController::class, 'store' ])->name('parts.store');
Route::put('parts/update/{id}', [ PartsController::class, 'update' ])->name('parts.update');
Route::delete('parts/delete/{id}', [ PartsController::class, 'delete' ])->name('parts.delete');

// Locations
Route::get('locations/get', [ LocationsController::class, 'index' ])->name('location.index');
Route::post('locations/store', [ LocationsController::class, 'store' ])->name('location.store');
Route::put('locations/update/{id}', [ LocationsController::class, 'update' ])->name('location.update');
Route::delete('locations/delete/{id}', [ LocationsController::class, 'delete' ])->name('location.delete');
