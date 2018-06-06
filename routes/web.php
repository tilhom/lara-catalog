<?php

Route::get('/', 'ShopController@index')->name('home');

 Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
 //POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//ссылка для сброса пароля (можно размещать в письме)
 Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//POST запрос для сброса старого и установки нового пароля
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

 Route::post('admin/login', 'Auth\LoginController@login');
 Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');

 Auth::routes();
 Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');

Route::view('/home','shop-home');
Route::view('/item','shop-item');
Route::middleware(['auth'])->prefix('admin')->group(function () {
	// Matches The "/admin/users" URL
    Route::get('/',function(){
    	return view('admin.index');
    })->name('admin.index');
    Route::resources([
    	'categories'=>'CategoryController',
    	'animals'=> 'AnimalController'
    ]);
});
Route::get('/{cslug}/{aslug}', 'ShopController@show')->name('show');
Route::get('/{cslug}', 'ShopController@showcat')->name('showcat');
