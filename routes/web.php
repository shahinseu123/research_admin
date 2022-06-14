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
// auth 
Route::get('/', 'login\LoginController@login')->name('login');
Route::post('/login/action', 'login\LoginController@login_action')->name('login.action');
Route::get('/register', 'register\RegisterController@register')->name('register');
Route::post('/register/action', 'register\RegisterController@register_action')->name('register.action');
// admin panel 
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/researcher', 'admin\ResearcherController@dashboard')->name('user.researcher');
    Route::get('/logout', 'admin\ResearcherController@logout')->name('user.logout');
    Route::get('/researcher-edit/{id}', 'admin\ResearcherController@edit')->name('researher.edit');
    Route::get('/researcher-delete/{id}', 'admin\ResearcherController@delete')->name('researher.delete');
    Route::post('/researcher-update', 'admin\ResearcherController@update')->name('researcher-update');

    Route::get('/research-progress', 'research\ResearchController@index')->name('user.research-progress');
    Route::get('/add-progress', 'research\ResearchController@add')->name('add-progress');
    Route::post('/create-progress', 'research\ResearchController@create')->name('progress-create');
    Route::get('/progress/edit/{id}', 'research\ResearchController@edit')->name('researh.edit');
    Route::get('/progress/delete/{id}', 'research\ResearchController@delete')->name('researh.delete');
    Route::get('/progress/show/{id}', 'research\ResearchController@show')->name('researh.show');
    Route::post('/progress/update', 'research\ResearchController@update')->name('progress-update');
});
