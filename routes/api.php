<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\NawlonApiController;
use App\Http\Controllers\license\UpdateLicenseController;
use App\Http\Controllers\users\carTransport\CarTransportController;

$controller_path = 'App\Http\Controllers';
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


Route::controller(LoginController::class)->group(function(){
Route::post('api_login/login','login')->name('login');
Route::post('api_login/logout','logout')->name('logout')->middleware('auth:sanctum');


});

Route::controller(NawlonApiController::class)->prefix('Car')->group(function () {
    Route::get('data','carTransport')->name('carData')->middleware('auth:sanctum');
});
Route::controller(CarTransportController::class)->group(function () {
    Route::get('filterNawlon','filterNawlon')->name('filterNawlon');
    Route::get('filterMaintanence','filterMaintanence')->name('filterMaintanence');
});

Route::controller(UpdateLicenseController::class)->group(function () {
    Route::get('filterCar','filterCar')->name('filterCar');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
