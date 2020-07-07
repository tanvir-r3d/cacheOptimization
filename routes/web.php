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
Route::get('/','HomeController@index');
Route::get('blank','HomeController@indexp');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
 
Route::resource('employee','EmployeeController');
Route::get('employee.list','EmployeeController@list');
Route::get('employee.update','EmployeeController@update');

Route::resource('worker','WorkerController');
Route::post('worker/{id}','WorkerController@update');
Route::post('worker/{id}/delete','WorkerController@destroy')->name('worker.delete');

Route::resource('jsTable','JsTableController');

