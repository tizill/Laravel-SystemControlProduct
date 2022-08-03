<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Middleware\LogAccessMiddleware;
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

//SALES ROUTE RESOURCE 
Route::middleware(LogAccessMiddleware::class)->resource('/sales', SaleController::class);

// RESOURCE PRODUCTS ROUTE
Route::middleware(LogAccessMiddleware::class)->resource('/products', ProductController::class);