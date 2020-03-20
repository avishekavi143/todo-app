<?php

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

// Task CRUD
Route::get('/','TaskController@index')->name('task');
Route::get('/add','TaskController@add')->name('task.add');
Route::post('/store','TaskController@store')->name('task.store');
Route::get('/{id}/edit','TaskController@edit')->name('task.edit');
Route::put('/update/{id}','TaskController@update')->name('task.update');
Route::delete('/delete/{id}','TaskController@destroy')->name('task.destroy');

// Task Status Update
Route::get('/setcompleted/{id}','TaskController@setCompleted')->name('task.setcompleted');
Route::get('/setincompleted/{id}','TaskController@setIncompleted')->name('task.setincompleted');

// completed task list
Route::get('/completedlist','TaskController@completedList')->name('task.completedlist');

// task Detail
Route::post('/getdetail','TaskController@show')->name('task.getdetail');


