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

Route::get('insertDataProductAdobeXD', 'ApiController@insertDataProduct_AdobeXD');
Route::post('insertDataCourseAdobeXD', 'ApiController@insertDataCourse_AdobeXD');

Route::get('posts', 'ApiController@index');
Route::get('writers/{id}', 'ApiController@writer');
Route::get('postsByCategory/{categoryOfPage}', 'ApiController@postsByCategory');
Route::post('/category/store', 'ApiController@Category_store')->name('admin.api.category.store');

Route::post('/Telegram/SetPublishPost', 'ApiController@TelegramSetPublishPost')->name('admin.api.telegram.setpublishpost');
Route::get('/Telegram/GetListDraftPost', 'ApiController@TelegramGetListDraftPost')->name('admin.api.telegram.getlistdraftpost');

Route::post('/order/AddProduct','OrderController@AddProduct');
Route::delete('/order/RemoveProduct/{pk}/{pk_product}','OrderController@RemoveProduct');
Route::post('/order/AddPhisicalDelivery','OrderController@AddPhisicalDelivery');
Route::post('/order/showorder','OrderController@showorder');


Route::post('/SendSms','ApiController@SendSms');
Route::post('/SendEmail','ApiController@SendEmail');

Route::get('/DateTime/GetNow', 'ApiController@DateTimeGetNow')->name('admin.api.datetime.GetNow');
Route::post('/DateTime/CheckTarikhIsLastFromNow', 'ApiController@DateTimeCheckTarikhIsLastFromNow')->name('admin.api.datetime.CheckTarikhIsLastFromNow');
Route::post('/calculator', 'ApiController@DiscountCalculator');

Route::post('/downloadcount/{id}', 'ApiController@downloadcounter');


Route::post('/Gap/callback', 'Messenger\GapController@callback')->name('Gap.callback');

Route::post('/delivery/setaddress', 'ApiController@setaddress');
Route::post('/delivery/showaddress', 'ApiController@showaddress');
Route::post('/delivery/selectaddress', 'ApiController@selectaddress');





Route::post('/Vote/GetByName', 'VoteController@GetVoteByName')->name('admin.api.Vote.GetByName');
Route::post('/Vote/AnswerUser', 'VoteController@AnswerUser')->name('admin.api.Vote.AnswerUser');



Route::post('/Behavior/AddLike', 'BehaviorController@AddLike')->name('Behavior.Vote.AddLike');
Route::post('/Behavior/AddDisslike', 'BehaviorController@AddDisslike')->name('Behavior.Vote.AddDisslike');
Route::post('/Behavior/AddComment', 'BehaviorController@AddComment')->name('Behavior.Vote.AddComment');
Route::post('/Behavior/ShareContent', 'BehaviorController@ShareContent')->name('Behavior.Vote.ShareContent');
