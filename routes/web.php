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
    return view('welcome');
});
/*Route::get('/home', function () {
    return view('home');
});*/

Route::group(['prefix' => 'members', 'middleware' => 'auth'], function () {
    Route::get('/', [
        'as' => 'members.index',
        'uses' => 'MemberController@index'
    ]);
    Route::get('/create', [
        'as' => 'members.create',
        'uses' => 'MemberController@create'
    ]);
    Route::post('/store', [
        'as' => 'members.store',
        'uses' => 'MemberController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'members.edit',
        'uses' => 'MemberController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'members.update',
        'uses' => 'MemberController@update'
    ]);
    Route::delete('/delete/{id}', [
        'as' => 'members.delete',
        'uses' => 'MemberController@delete'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
