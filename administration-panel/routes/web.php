<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('companies.index');
});


Auth::routes();

Route::resource('companies', '\App\Companies\Http\Controllers\CompanyController')->middleware('auth');
Route::resource('employees', '\App\Employees\Http\Controllers\EmployeeController')->middleware('auth');
