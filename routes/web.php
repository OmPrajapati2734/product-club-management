<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClubController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('products',[ProductsController::class, 'index']);
Route::post('products',[ProductsController::class, 'store']);
Route::get('fetch-product',[ProductsController::class, 'fetchproduct']);
Route::get('edit-product/{id}', [ProductsController::class, 'edit']);
Route::put('update-product/{id}', [ProductsController::class, 'update']);
Route::delete('delete-product/{id}', [ProductsController::class, 'destroy']);
// Route::resource('home','ProductsController')->names([
//     'update-product' => 'home.update',
// ]);

//club routes
Route::get('search', [ClubController::class, 'search']);   
Route::get('clubs',[ClubController::class, 'index']);
Route::post('clubs',[ClubController::class, 'store']);
Route::get('fetch-club',[ClubController::class, 'fetchclub']);
Route::get('edit-club/{id}', [ClubController::class, 'edit']);
Route::post('update-club/{id}', [ClubController::class, 'update']);
Route::delete('delete-club/{id}', [ClubController::class, 'destroy']);   
