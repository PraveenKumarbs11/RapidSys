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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users/{name}', function($name = null){
	return "Hi ". $name ."!";
});

Route::match(['get', 'post'], '/reqmethod', function(Request $req){
	return "Requested method is ". $req->method();
});

Route::any('/anymethod', function(Request $req){
	return "Requested method is ". $req->method();
});