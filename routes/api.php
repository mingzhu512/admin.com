<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: http://localhost:8080/');
header('Access-Control-Allow-Origin: https://bishoyromany.github.io/tutorials/');

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


Route::post('register', 'AuthController@register');
Route::get('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::get('recover', 'AuthController@recover');

/**
 * generate razorpay order id  
 */
Route::post('razorpay/create/order/id' , 'PaymentsController@GenerateRazorpayOrderId');

/**
 * needs auth routes
 */
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});


Route::post('execute/php' , 'CodeExecuter@php');
Route::get('execute/php' , 'CodeExecuter@php');