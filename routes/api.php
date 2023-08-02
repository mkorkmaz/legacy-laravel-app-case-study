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
    ->get('/currencies', [App\Http\Controllers\Currencies\ListCurrenciesController::class, 'getCurrencies']);

Route::middleware('api.public')
    ->get('/currency-values/{currencyCode}', [App\Http\Controllers\Currencies\ListLatestCurrencyValuesController::class, 'getCurrencyDetails']);
