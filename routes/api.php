<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeVehicleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ManufacturerController;
use App\Models\Type;
use App\Models\Manufacturer;
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


Route::get('vehicles', [VehicleController::class, 'index']);
Route::get('vehicles/{id}', [VehicleController::class, 'show']);

// Route::resource('vehicles', VehicleController::class)->only(['index', 'show', 'destroy']);

Route::get('/Types', [TypeController::class, 'index']);
Route::get('/Types/{id}', [TypeController::class, 'show']);

Route::post('/Types', [TypeController::class, 'store']);

Route::resource('Types', TypeController::class)->except('create', 'edit');

Route::resource('manufacturers', ManufacturerController::class)->except('create', 'edit');

Route::get('Types/{id}/vehicles', [TypeVehicleController::class, 'index'])->name('Types.vehicles.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('manufacturers', ManufacturerController::class)->only(['update', 'store', 'destroy']);
    Route::resource('Types', TypeController::class)->only(['store', 'destroy']);
    Route::resource('vehicles', VehicleController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('manufacturers', ManufacturerController::class)->only(['index', 'show']);
Route::resource('Types', TypeController::class)->only(['index', 'show']);
Route::resource('vehicles', VehicleController::class)->only(['index', 'show']);
Route::resource('Types.vehicles', TypeVehicleController::class)->only(['index']);