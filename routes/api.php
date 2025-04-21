<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\Setup;

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

Route::prefix('defect')->group(function(){
    Route::get('/', [Setup\DefectController::class, 'loadAll']);
    Route::get('/{param}', [Setup\DefectController::class, 'editOne']);
});

Route::prefix('/setup')->group(function(){

    Route::prefix('/citizen')->group(function(){
        Route::resource('/country',Setup\Citizen\CountryController::class);
        Route::resource('/state',Setup\Citizen\StateController::class);
        Route::resource('/city',Setup\Citizen\CityController::class);
        Route::resource('/people',Setup\Citizen\PeopleController::class);
    });

    Route::resource('/category', Setup\CategoryController::class);

});

Route::prefix('/resource-mapping')->group(function(){
    Route::prefix('/citizen')->group(function(){
        Route::get('/country-list', [\App\Http\Controllers\ResoureMap\CitizenMap::class,'countryList']);
        Route::get('{id}/state-list', [\App\Http\Controllers\ResoureMap\CitizenMap::class,'statesByCountry']);
        Route::get('{id}/city-list', [\App\Http\Controllers\ResoureMap\CitizenMap::class,'citiesByState']);
        Route::get('{id}/people-list', [\App\Http\Controllers\ResoureMap\CitizenMap::class,'peopleByCity']);
    });
});

Route::prefix('/file-upload')->group(function(){
    Route::patch('/single',[\App\Http\Controllers\FileUploadController::class,'single']);
});

Route::prefix('/qr-code')->group(function(){
    Route::get('/',[\App\Http\Controllers\QrCodeController::class,'index']);
});
