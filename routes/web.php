<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ApiController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [UserAuthController::class, 'login'])->middleware('AlreadyLoggedIn');
Route::get('register', [UserAuthController::class, 'register'])->middleware('AlreadyLoggedIn');
//Google routes
Route::get('auth/google', [UserAuthController::class, 'google']);
Route::get('auth/google/redirect', [UserAuthController::class, 'googleRedirect']);

//Github routes
Route::get('auth/github', [UserAuthController::class, 'github']);
Route::get('auth/github/redirect', [UserAuthController::class, 'githubRedirect']);

Route::get('forgotPassword', [UserAuthController::class, 'forgotPassword']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::group(['middleware'=>'loguser'],function(){
	Route::get('profile', [UserAuthController::class, 'profile'])->middleware('isLogged');	 
	Route::get('/add-Employee', [EmployeeController::class, 'addEmployee'])->middleware('isLogged');
	Route::match(['get', 'post'], '/create-employee', [EmployeeController::class, 'createEmployee'])->name('employee.create')->middleware('isLogged');
	Route::get('/employees', [EmployeeController::class, 'getEmployee'])->middleware('isLogged');
	Route::get('/employees/{id}',[EmployeeController::class, 'getEmployeeById'])->middleware('isLogged');
	Route::get('/delete-employee/{id}',[EmployeeController::class, 'deleteEmployee'])->middleware('isLogged');
	Route::get('/edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->middleware('isLogged');
	Route::match(['get', 'post'], '/update-employee', [EmployeeController::class, 'updateEmployee'])->name('employee.update')->middleware('isLogged');
});
Route::get('logout', [UserAuthController::class, 'logout']);

//APi call routes
Route::get('apidata', [ApiController::class, 'getApiData']);