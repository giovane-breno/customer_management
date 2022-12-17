<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('customers', 'App\Http\Controllers\Api\CustomerController');

Route::prefix('customers')->group(function ()
    {
        Route::get('/', [CustomerController::class, 'findActiveCustomers']);
        Route::post('/', [CustomerController::class, 'addCustomer']);
        Route::post('/{id}', [CustomerController::class, 'selectCustomer']);
        Route::delete('/{id}', [CustomerController::class, 'deleteCustomer']);
    });