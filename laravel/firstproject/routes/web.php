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


route::view('adminTables','admin.tables')->name('adminTabales');
route::view('admin','admin.test');
route::view('createformation','admin.formation.create')->name('create.formation');

route::get('editformation/{id}','FormationController@edit')->name('edit.formation');
route::post('editformation/{id}','FormationController@update')->name('update.formation');
route::get('deleteformation/{id}','FormationController@destroy')->name('delete.formation');

Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');



route::get('/index','FormationController@index')->name('index');

route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');





route::post('insertformatin','FormationController@store')->name('store.formation');

// route::get('/getexperiences','FormationController@getExperiences')->name('get.experiences');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



