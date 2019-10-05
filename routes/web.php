<?php

/*  Landing Original page 
Route::get('/', 'HomeController@index')->name('index');
*/

Route::get('/payment/paymentstart', 'HomeController@paymentstart')->name('paymentstart');
Route::get('/payment/paymentcomplete', 'HomeController@paymentcomplete')->name('paymentcomplete');

Route::get('/products', 'HomeController@show')->name('product.show');

Route::get('/', 'HomeController@index')->name('index');

Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/Contactus', 'HomeController@show_Contactus')->name('Contactus');
Route::get('/Aboutus', 'HomeController@show_Abutus')->name('Aboutus');
Route::get('/post/{slug}', 'PostController@detail')->name('post.detail');
Route::get('/post/category/{slug}', 'PostController@postByCategory')->name('post.category');
Route::get('/post/tag/{slug}', 'PostController@postByTag')->name('post.tag');

Route::post('/behavior/store', 'BehaviorController@store')->name('behavior.store');

Route::get('/search', 'SearchController@store')->name('search.index');


Route::get('/category/show/{name}', 'PostController@postByCategory')->name('category.show');


Route::get('/reset', 'ResetPasswordController@index')->name('reset.index');
Route::post('/reset/store', 'ResetPasswordController@store')->name('reset.store');
Route::get('/reset/show/{id}', 'ResetPasswordController@show')->name('reset.show');
Route::get('/reset/update/{id}', 'ResetPasswordController@update')->name('reset.update');
Route::post('/reset/delete/{id}', 'ResetPasswordController@destroy')->name('reset.delete');


Route::post('/message/store', 'MessageController@store')->name('message.store');


Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>'auth'], function() 
{

    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('/home/index', 'HomeController@index')->name('admin.home');


    Route::get('/post/index', 'PostController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostController@create')->name('admin.post.create');
    Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('admin.post.update');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('admin.post.delete');
    Route::post('/post/upload', 'PostController@upload')->name('admin.post.upload');


    Route::get('/category/index', 'CategoryController@index')->name('admin.category.index');
    Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('admin.category.update');


    Route::get('/tag/index', 'TagController@index')->name('admin.tag.index');
    Route::get('/tag/create', 'TagController@create')->name('admin.tag.create');
    Route::post('/tag/store', 'TagController@store')->name('admin.tag.store');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('admin.tag.delete');
    Route::get('/tag/edit/{id}', 'TagController@edit')->name('admin.tag.edit');
    Route::post('/tag/update/{id}', 'TagController@update')->name('admin.tag.update');



    Route::get('/user/index', 'UserController@index')->name('admin.user.index');
    Route::get('/user/create', 'UserController@create')->name('admin.user.create');
    Route::get('/user/delete/{id}', 'UserController@destroy')->name('admin.user.delete');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('admin.user.edit');
    Route::post('/user/update/{id}', 'UserController@update')->name('admin.user.update');
    Route::post('/user/store', 'UserController@store')->name('admin.user.store');


    Route::get('/Profile/edit/', 'ProfileController@edit')->name('admin.profile.edit');
    Route::post('/Profile/update/{id}', 'ProfileController@update')->name('admin.profile.update');


    Route::get('/behavior/index', 'BehaviorController@index')->name('admin.behavior.index');
    Route::get('/behavior/create', 'BehaviorController@create')->name('admin.behavior.create');
    Route::get('/behavior/edit/{id}', 'BehaviorController@edit')->name('admin.behavior.edit');
    Route::post('/behavior/store', 'BehaviorController@store')->name('admin.behavior.store');
    Route::get('/behavior/delete/{id}', 'BehaviorController@destroy')->name('admin.behavior.delete');
    Route::post('/behavior/update/{id}', 'BehaviorController@update')->name('admin.behavior.update');

});

Route::group(['prefix' => 'user','namespace' => 'User','middleware'=>'auth'], function() 
{
    Route::get('/home', 'HomeController@index')->name('user.home');

    Route::get('/home/index', 'HomeController@index')->name('user.home');

    Route::get('/Profile/edit/', 'ProfileController@edit')->name('user.profile.edit');
    Route::post('/Profile/update/{id}', 'ProfileController@update')->name('user.profile.update');
});


Route::group(['prefix' => 'writer','namespace' => 'Writer','middleware'=>'auth'], function() 
{
    Route::get('/home/index', 'HomeController@index')->name('writer.home');
    Route::get('/home', 'HomeController@index')->name('writer.home');

    Route::get('/Profile/edit/', 'ProfileController@edit')->name('writer.profile.edit');
    Route::post('/Profile/update/{id}', 'ProfileController@update')->name('writer.profile.update');
});




Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
