<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/monthly-sales', [DashboardController::class, 'getMonthlySales']);
    Route::get('/annual-sales', [DashboardController::class, 'getAnnualSales']);
    Route::get('/person-sales', [DashboardController::class, 'getSalesByPerson']);
    Route::get('/products', [DashboardController::class, 'getProducts']);
    Route::get('/sales', [SalesController::class, 'index']);
});
