<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('posts', 'ApiController@index');

Route::get('writers/{id}', 'ApiController@writer');

Route::get('postsByCategory/{categoryOfPage}', 'ApiController@postsByCategory');

Route::post('/category/store', 'ApiController@Category_store')->name('admin.api.category.store');



