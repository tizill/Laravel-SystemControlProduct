<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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
Route::middleware('authentication')->get('/', [App\Http\Controllers\DashboardController::class, 'index']);

//LOGIN ROUTE
Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authentication']);
Route::get('/exit', [App\Http\Controllers\LoginController::class, 'exit']);

//SALES ROUTE RESOURCE 
Route::middleware('authentication','log.access')->resource('/sales', SaleController::class);

// RESOURCE PRODUCTS ROUTE
Route::middleware('authentication','log.access')->resource('/products', ProductController::class);