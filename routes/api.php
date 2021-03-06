<?php

use App\Http\Controllers\IndexController;
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

Route::post('/store', [IndexController::class, 'store'])->name('tracking.store');
Route::get('/get', [IndexController::class, 'get'])->name('tracking.get');
Route::get('/getSingle/{tracking_code}', [IndexController::class, 'getSingle'])->name('tracking.getSingle');
Route::get('/fetchTrackingStatus/{tracking_code}', [IndexController::class, 'fetchTrackingStatus'])->name('tracking.fetchTrackingStatus');
