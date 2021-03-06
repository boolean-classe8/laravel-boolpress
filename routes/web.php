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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ]
    ], function() {
        Route::get('/', 'HomeController@index')->name('public.home');
        Route::get(LaravelLocalization::transRoute('routes.contact'), 'HomeController@contatti')->name('contatti.show');
        Route::post(LaravelLocalization::transRoute('routes.contact'), 'HomeController@contattiStore')->name('contatti.store');
        Route::get(LaravelLocalization::transRoute('routes.thankyou'), 'HomeController@grazie')->name('contatti.grazie');

        Route::get(LaravelLocalization::transRoute('routes.blog'), 'PostController@index')->name('blog');
        Route::get(LaravelLocalization::transRoute('routes.article'), 'PostController@show')->name('blog.show');
        Route::get(LaravelLocalization::transRoute('routes.category'), 'PostController@postCategoria')->name('blog.category');
        Route::get(LaravelLocalization::transRoute('routes.tag'), 'PostController@postTag')->name('blog.tag');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');
    Route::get('/account', 'HomeController@account')->name('account');
    Route::post('/genera-token', 'HomeController@generaToken')->name('token');
});
