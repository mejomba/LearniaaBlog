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



/* New API's */

Route::post('/Telegram/SetPublishPost', 'ApiController@TelegramSetPublishPost')->name('admin.api.telegram.setpublishpost');
Route::get('/Telegram/GetListDraftPost', 'ApiController@TelegramGetListDraftPost')->name('admin.api.telegram.getlistdraftpost');

Route::post('/SendSms','ApiController@SendSms');
Route::get('/DateTime/GetNow', 'ApiController@DateTimeGetNow')->name('admin.api.datetime.now');


Route::post('/Gap/callback', 'Messenger\GapController@callback')->name('Gap.callback');
