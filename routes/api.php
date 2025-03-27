<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;

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

Route::prefix('store')->group(function(){
    Route::get('/load', [StoreController::class,'loadAll']);
    Route::post('/save-one', [StoreController::class,'saveOne']);
    Route::get('{id}/edit-one', [StoreController::class,'editOne']);
    Route::put('{id}/update-one', [StoreController::class,'updateOne']);
    Route::delete('{id}/delete-one', [StoreController::class,'deleteOne']);
});
