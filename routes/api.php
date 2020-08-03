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

Route::get('insertDatapackageAdobeXD', 'ApiController@insertDatapackage_AdobeXD');
Route::post('insertDataCourseAdobeXD', 'ApiController@insertDataCourse_AdobeXD');

Route::get('blog_posts', 'ApiController@index');
Route::get('writers/{id}', 'ApiController@writer');
Route::get('blog_postsByCategory/{categoryOfPage}', 'ApiController@blog_postsByCategory');
Route::post('/category/store', 'ApiController@Category_store')->name('admin.api.category.store');

Route::post('/Telegram/SetPublishBlogPost', 'ApiController@TelegramSetPublish_BlogPost')->name('admin.api.telegram.SetPublishBlogPost');
Route::get('/Telegram/GetListDraftBlogPost', 'ApiController@TelegramGetListDraft_BlogPost')->name('admin.api.telegram.GetListDraftBlogPost');

Route::post('/order/Addpackage','OrderController@Addpackage');
Route::delete('/order/Removepackage/{pk}/{pk_package}','OrderController@Removepackage');
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



Route::get('/Vote/filter', 'ApiController@filter')->name('admin.api.Vote.filter');


Route::post('/Vote/GetByName', 'VoteController@GetVoteByName')->name('admin.api.Vote.GetByName');
Route::post('/Vote/AnswerUser', 'VoteController@AnswerUser')->name('admin.api.Vote.AnswerUser');



Route::post('/Behavior/AddLike', 'BehaviorController@AddLike')->name('Behavior.Vote.AddLike');
Route::post('/Behavior/AddDisslike', 'BehaviorController@AddDisslike')->name('Behavior.Vote.AddDisslike');
Route::post('/Behavior/AddComment', 'BehaviorController@AddComment')->name('Behavior.Vote.AddComment');
Route::post('/Behavior/ShareContent', 'BehaviorController@ShareContent')->name('Behavior.Vote.ShareContent');

<<<<<<< HEAD
Route::post('/GenerateNewUuid', 'ApiController@GenerateNewUuid')->name('api.GenerateNewUuid');
Route::post('/SetFamilyUser', 'ApiController@SetFamilyUser')->name('api.log.SetFamilyUser');
Route::post('/GetPopupData', 'ApiController@GetPopupData')->name('api.routing.GetPopupData');
Route::post('/SetAnswerUser', 'ApiController@SetAnswerUser')->name('api.routing.SetAnswerUser');
=======
Route::get('/GenerateNewUuid', 'ApiController@GenerateNewUuid')->name('api.GenerateNewUuid');
Route::get('/log/{uuid}', 'ApiController@SetFamilyUser')->name('api.log.SetFamilyUser');
Route::get('/log/{uuid}/{location_user_id}', 'ApiController@GetPopupData')->name('api.routing.GetPopupData');
Route::get('/log/{uuid}/{location_user_id}/next', 'ApiController@SetAnswerUser')->name('api.routing.SetAnswerUser');
>>>>>>> 4222ec42b2ec43439ed690732a9a7810d14139f8


