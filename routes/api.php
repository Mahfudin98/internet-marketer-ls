<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('city', [AnggotaController::class, 'getCity']);
Route::get('district', [AnggotaController::class, 'getDistrict']);

// chart
Route::get('reseller-bar', [DashboardController::class, 'barReseller'])->name('bar.reseller');
