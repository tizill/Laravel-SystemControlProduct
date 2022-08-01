<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Telas para ver o funcionamento sem dados
*/
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

//SALES ROUTE
Route::get('/sales',  [App\Http\Controllers\SaleController::class, 'create']);
Route::post('/sales',  [App\Http\Controllers\SaleController::class, 'store']);
Route::get('/sales/edit/{id_sale}', [\App\Http\Controllers\SaleController::class, 'edit']);
Route::post('/sales/update/{id_sale}', [\App\Http\Controllers\SaleController::class, 'update']);
Route::delete('/sales/delete/{id_sale}', [\App\Http\Controllers\SaleController::class, 'destroy']);

//PRODUCTS ROUTE
Route::get('/products', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/edit/{id_product}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/products/update/{id_product}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/delete/{id_product}', [\App\Http\Controllers\ProductController::class, 'destroy']);