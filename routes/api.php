<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\categoriesController;
use App\Http\Controllers\Api\ResturantControlle;

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

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::get('/categories', [categoriesController::class, 'index']);

    Route::get('/resturants', [ResturantControlle::class, 'index']);
    Route::get('/get-resturant', [ResturantControlle::class, 'show']);


    Route::get('/resturants-by-idcategory', [ResturantControlle::class, 'resturants_by_idcategory']);

    Route::post('/search-resturant', [ResturantControlle::class, 'search']);

});



