<?php

use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\CurrencyValue\CurrencyValueController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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


Route::group(
    [
        'middleware' => [
            'jwt.verify',
        ]
    ],
    function () {
        Route::get('/currency_values/{code}', [CurrencyValueController::class, 'getCurrencyValueByCurrencyCode']);
        Route::post('/currency_values', [CurrencyValueController::class, 'store']);
        Route::delete('/currency_values/{id}', [CurrencyValueController::class, 'deleteById']);
        Route::put('/currency_values/{id}', [CurrencyValueController::class, 'updateById']);

        Route::get('/user', [UserController::class, 'index']);


        Route::get('/currency', [CurrencyController::class, 'index']);
        Route::post('/currency', [CurrencyController::class, 'store']);
    }
);

Route::group(
    [
        'middleware' => [
            'api.public',
        ]
    ],
    function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/user', [UserController::class, 'store']);
    }
);
