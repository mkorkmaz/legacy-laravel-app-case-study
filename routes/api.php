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
    ->get('/currencies', App\Http\Controllers\Currencies\ListCurrencies::class);

Route::middleware('api.public')
    ->get('/currency_values/{currencyCode}', App\Http\Controllers\Currencies\listLatestCurrencyValues::class);
