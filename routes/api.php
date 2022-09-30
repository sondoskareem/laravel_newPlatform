<?php

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


Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('/logout','App\Http\Controllers\API\AuthController@logout');

Route::get('/interest/courses','App\Http\API\Controllers\CourseController@coursesInInterest');
Route::get('/interest/stores','App\Http\API\Controllers\StoreController@storesInInterest');

Route::post('/follow','App\Http\Controllers\API\UserController@follow');
Route::post('/unfollow','App\Http\Controllers\API\UserController@unfollow');

Route::get('/followers','App\Http\Controllers\API\UserController@followers');
Route::get('/following','App\Http\Controllers\API\UserController@following');


Route::post('/user/interest','App\Http\Controllers\API\UserController@interest');
Route::get('/user/interest','App\Http\Controllers\API\UserController@interestIndex');






Route::apiResource('user', App\Http\Controllers\API\UserController::class);
Route::apiResource('client', App\Http\Controllers\API\ClientController::class);
Route::apiResource('clienttype', App\Http\Controllers\API\ClientTypeController::class);
Route::apiResource('address', App\Http\Controllers\API\AddressController::class);
Route::apiResource('gallery', App\Http\Controllers\API\GalleryController::class);
Route::apiResource('store', App\Http\Controllers\API\StoreController::class);
Route::apiResource('category', App\Http\Controllers\API\CategoryController::class);
Route::apiResource('product', App\Http\Controllers\API\ProductController::class);
Route::apiResource('cart', App\Http\Controllers\API\CartController::class);
Route::apiResource('order', App\Http\Controllers\API\OrderController::class);
Route::apiResource('orderdetail', App\Http\Controllers\API\OrderDetailController::class);
Route::apiResource('coursetopic', App\Http\Controllers\API\CourseTopicController::class);
Route::apiResource('coursecategory', App\Http\Controllers\API\CourseCategoryController::class);
Route::apiResource('course', App\Http\Controllers\API\CourseController::class);
Route::apiResource('coursedetail', App\Http\Controllers\API\CourseDetailController::class);
Route::apiResource('courseasset', App\Http\Controllers\API\CourseAssetController::class);
Route::apiResource('reservationtype', App\Http\Controllers\API\ReservationTypeController::class);
Route::apiResource('reservation', App\Http\Controllers\API\ReservationController::class);
Route::apiResource('reservationlog', App\Http\Controllers\API\ReservationLogController::class);
