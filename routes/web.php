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
namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return env('APP_NAME');
});

Route::resource('/home', 'MovieController',['exept'=>['home.create','home.edit']]);

Route::get('/category', 'CategoryController@showInsertCategoryForm');
Route::post('/category', 'CategoryController@insertCategory');

Route::get('/cast', 'CastController@showInsertCastForm');
Route::post('/cast','CastController@insertCast');

Route::get('/filters','FilterController@index');
Route::get('/myfilters','FilterController@filterData');



// Auth::routes();
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::name('password.')->group(function(){
    Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('request');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('email');
    Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('reset');
    Route::post('password/reset','Auth\ResetPasswordController@reset');
});

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');


