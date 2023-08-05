<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('api.public')
    ->post('/login', [App\Http\Controllers\User\LoginController::class, 'login']);

Route::middleware('api.public')
    ->post('/register', [App\Http\Controllers\User\LoginController::class, 'register']);

Route::middleware('api.public')
    ->get('/currencies', [App\Http\Controllers\Currencies\CurrencyController::class, 'getCurrencies']);

Route::middleware('api.public')
    ->get('/currency-values/{currencyCode}', [App\Http\Controllers\Currencies\CurrencyValuesController::class, 'getCurrencyDetails']);

Route::group(['middleware' => ['auth:sanctum','api.public']], function ($route) {
    $route->post('/currency', [App\Http\Controllers\Currencies\CurrencyController::class, 'storeCurrency']);
    $route->put('/currency/{currencyCode}', [App\Http\Controllers\Currencies\CurrencyController::class, 'updateCurrency']);
    $route->post('/currency-value/{currencyCode}', [App\Http\Controllers\Currencies\CurrencyValuesController::class, 'storeCurrencyValue']);
});
