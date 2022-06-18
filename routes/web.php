<?php

use App\Models\categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ResturantsController;
use App\Http\Controllers\ResturantListImgController;
use App\Http\Controllers\ResturantListMenuController;
use App\Http\Controllers\ResturantListPhonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.login'); });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/category',[CategoriesController::class, 'index']);
Route::get('/add-category',[CategoriesController::class, 'add']);
Route::post('/store-category',[CategoriesController::class, 'store']);
Route::get('/edit-category/{id}',[CategoriesController::class, 'edit']);
Route::post('/update-category',[CategoriesController::class, 'update']);
Route::get('/delete-category/{id}',[CategoriesController::class, 'delete']);


Route::get('/resturants',[ResturantsController::class, 'index']);
Route::get('/add-resturant',[ResturantsController::class, 'add']);
Route::post('/store-resturant',[ResturantsController::class, 'store']);
Route::get('/edit-resturant/{id}',[ResturantsController::class, 'edit']);
Route::post('/update-resturant',[ResturantsController::class, 'update']);
Route::get('/delete-resturant/{id}',[ResturantsController::class, 'delete']);


Route::get('/resturant-list-img/{id}',[ResturantListImgController::class, 'index']);
Route::get('/add-list-img/{id}',[ResturantListImgController::class, 'add']);
Route::post('/store-list-img',[ResturantListImgController::class, 'store']);
Route::get('/edit-list-img/{id}/',[ResturantListImgController::class, 'edit']);
Route::post('/update-list-img',[ResturantListImgController::class, 'update']);
Route::get('/delete-list-img/{id}',[ResturantListImgController::class, 'delete']);


Route::get('/resturant-list-phons/{id}',[ResturantListPhonController::class, 'index']);
Route::get('/add-list-phone/{id}',[ResturantListPhonController::class, 'add']);
Route::post('/store-list-phone',[ResturantListPhonController::class, 'store']);
Route::get('/edit-list-phone/{id}/',[ResturantListPhonController::class, 'edit']);
Route::post('/update-list-phone',[ResturantListPhonController::class, 'update']);
Route::get('/delete-list-phone/{id}',[ResturantListPhonController::class, 'delete']);


Route::get('/resturant-list-menu/{id}',[ResturantListMenuController::class, 'index']);
Route::get('/add-list-menu/{id}',[ResturantListMenuController::class, 'add']);
Route::post('/store-list-menu',[ResturantListMenuController::class, 'store']);
Route::get('/edit-list-menu/{id}/',[ResturantListMenuController::class, 'edit']);
Route::post('/update-list-menu',[ResturantListMenuController::class, 'update']);
Route::get('/delete-list-menu/{id}',[ResturantListMenuController::class, 'delete']);

