<?php

use App\Category;

Route::get('welcome/{locale}', function ($locale) {
    if($locale) App::setLocale($locale);
    echo $locale."<br>";
    echo __('message.welcome')."<br>";
    echo __("I love programming.");
});



Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

     //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], ['en','uz'])) {
        unset($segments[1]); //удаляем метку
        array_splice($segments, 1, 0, $locale);
    } 
      $url = Request::root().implode("/", $segments);
    
    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){    
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу    
});
$myroutes =  function () {
    Route::get('/', 'ShopController@index')->name('home');

    Route::get('/search', 'ShopController@search')->name('search');

    Route::get('/search/{query}', 'ShopController@rsearch')->name('rs'); 
    Route::get('/{cslug}/{aslug}', 'ShopController@show')->name('show');
    Route::get('/{cslug}', 'ShopController@showcat')->name('showcat');
};

Route::group(['prefix' => 'uz'], $myroutes);
Route::group(['prefix' => 'en'], $myroutes);

Route::get('/', 'ShopController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/search/{query}', 'ShopController@rsearch')->name('rs');


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

 //Auth::routes();
// Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');

//Route::view('/home','shop-home');
//Route::view('/item','shop-item');
Route::middleware(['auth'])->prefix('admin')->group(function () {
	// Matches The "/admin/users" URL
    Route::get('/',function(){
    	$categories = Category::all();
    	return view('admin.index',compact('categories'));
    })->name('admin.index');
    Route::resources([
    	'categories'=>'CategoryController',
    	'animals'=> 'AnimalController'
    ]);
});
Route::get('/{cslug}/{aslug}', 'ShopController@show')->name('show');
Route::get('/{cslug}', 'ShopController@showcat')->name('showcat');
