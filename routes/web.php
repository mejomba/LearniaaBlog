<?php

/*  Landing Original page 
Route::get('/', 'HomeController@index')->name('index');

*/
/*  Route::get('/500', 'HomeController@Page500')->name('Page500'); */

Route::get('/', 'AcademyController@index')->name('index');
Route::get('/academy/detail', 'AcademyController@detail')->name('academy.detail');
Route::get('/academy/show/{pk_course}/{desc}/{sort}/{pk_package}', 'AcademyController@show')->name('academy.show');
Route::get('/academy/road', 'AcademyController@road')->name('academy.road');
Route::get('/academy/mylearn', 'AcademyController@start_mylearn')->name('academy.mylearn');
Route::get('/academy/course/{pk_tree}/{pk_package}', 'AcademyController@course')->name('academy.course');
Route::post('/academy/saveprofile/{id}', 'AcademyController@saveprofile')->name('academy.saveprofile');
Route::post('/academy/roadmap', 'AcademyController@roadmap')->name('roadmap');
Route::get('/academy/roadmap', 'AcademyController@detail');
Route::get('/academy/quicklearn', 'AcademyController@quicklearn');

Route::get('/package/pay/{pk_package}', 'PackageController@pay')->name('package.pay');

Route::get('/Transaction/store', 'TransactionController@store')->name('transaction.store');
Route::get('/Transaction/show', 'TransactionController@show')->name('transaction.show');

Route::get('/mail', 'MailController@store');

Route::get('/assist', 'HomeController@ShowAssist')->name('assist');
Route::get('/search', 'HomeController@search')->name('search.index');
Route::get('/Contactus', 'HomeController@show_Contactus')->name('Contactus');
Route::get('/PrivacyPolicy', 'HomeController@show_PrivacyPolicy')->name('PrivacyPolicy');
Route::get('/TermsOfService', 'HomeController@show_TermsOfService')->name('TermsOfService');
Route::get('/Aboutus', 'HomeController@show_Aboutus')->name('Aboutus');
Route::get('/sitemap', 'HomeController@SitemapCreate')->name('sitemap');

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{en_title}', 'BlogController@show')->name('blog.show');
Route::get('/blog/category/{slug}', 'BlogController@postByCategory')->name('blog.category');
Route::get('/blog/tag/{slug}', 'BlogController@postByTag')->name('blog.tag');
Route::post('/behavior/store', 'BehaviorController@store')->name('behavior.store');
Route::get('/category/show/{name}', 'BlogController@postByCategory')->name('category.show');

Route::get('/resetpassword', 'ResetPasswordController@index')->name('reset.index');
Route::post('/reset/store', 'ResetPasswordController@store')->name('reset.store');
Route::get('/reset/show/{id}', 'ResetPasswordController@show')->name('reset.show');
Route::get('/reset/update/{id}', 'ResetPasswordController@update')->name('reset.update');
Route::post('/reset/delete/{id}', 'ResetPasswordController@destroy')->name('reset.delete');
Route::post('/reset/callbacklogin', 'ResetPasswordController@callbacklogin')->name('reset.callbacklogin');
Route::get('/reset/showcallbackloginform', 'ResetPasswordController@showcallbackloginform')->name('reset.showcallbackloginform');
Route::get('/registerconfirm', 'ResetPasswordController@registerconfirm')->name('registerconfirm');

Route::post('/message/store', 'MessageController@store')->name('message.store');
Route::post('/message/newspaper', 'MessageController@newspaper')->name('message.newspaper');
Route::post('/message/newspaperMobile', 'MessageController@newspaperMobile')->name('message.newspaperMobile');

Route::post('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('login.google.callback');

Route::get('/blog/rep', 'BlogController@replace');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>'auth'], function() 
{
    Route::get('/assist/index', 'HomeController@index_assist')->name('admin.assist.index');


    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('/home/index', 'HomeController@index')->name('admin.home');

    Route::get('/blog/index', 'BlogController@index')->name('admin.blog.index');
    Route::get('/blog/create', 'BlogController@create')->name('admin.blog.create');
    Route::post('/blog/store', 'BlogController@store')->name('admin.blog.store');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('admin.blog.edit');
    Route::post('/blog/update/{id}', 'BlogController@update')->name('admin.blog.update');
    Route::get('/blog/delete/{id}', 'BlogController@destroy')->name('admin.blog.delete');
    Route::post('/blog/upload', 'BlogController@upload')->name('admin.blog.upload');


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


    Route::get('/tree/index', 'TreeController@index_Tree')->name('admin.tree.index');
    Route::get('/tree/create', 'TreeController@create_Tree')->name('admin.tree.create');
    Route::post('/tree/store', 'TreeController@store_Tree')->name('admin.tree.store');
    Route::get('/tree/delete/{id}', 'TreeController@destroy_Tree')->name('admin.tree.delete');
    Route::get('/tree/edit/{id}', 'TreeController@edit_Tree')->name('admin.tree.edit');
    Route::post('/tree/update/{id}', 'TreeController@update_Tree')->name('admin.tree.update');
    Route::post('/tree/upload', 'TreeController@upload')->name('admin.tree.upload');

    Route::get('/node/create/{id}', 'TreeController@create_Node')->name('admin.node.create');
    Route::post('/node/store', 'TreeController@store_Node')->name('admin.node.store');
    Route::get('/node/delete/{id}', 'TreeController@destroy_Node')->name('admin.node.delete');
    Route::get('/node/edit/{id}', 'TreeController@edit_Node')->name('admin.node.edit');
    Route::post('/node/update/{id}', 'TreeController@update_Node')->name('admin.node.update');


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

    Route::get('/discount/index', 'DiscountController@index')->name('admin.discount.index');
    Route::get('/discount/create', 'DiscountController@create')->name('admin.discount.create');
    Route::get('/discount/edit/{pk_discount}', 'DiscountController@edit')->name('admin.discount.edit');
    Route::post('/discount/store', 'DiscountController@store')->name('admin.discount.store');
    Route::get('/discount/delete/{id}', 'DiscountController@destroy')->name('admin.discount.delete');
    Route::post('/discount/update/{id}', 'DiscountController@update')->name('admin.discount.update');

    Route::get('/order/index', 'OrderController@index')->name('admin.order.index');
    Route::get('/order/create', 'OrderController@create')->name('admin.order.create');
    Route::get('/order/edit/{id}', 'OrderController@edit')->name('admin.order.edit');
    Route::post('/order/store', 'OrderController@store')->name('admin.order.store');
    Route::get('/order/delete/{id}', 'OrderController@destroy')->name('admin.order.delete');
    Route::post('/order/update/{id}', 'OrderController@update')->name('admin.order.update');
    Route::get('/order/show/{id}', 'OrderController@show')->name('admin.order.show');

    Route::get('/order/createpackage/{key}', 'OrderController@orderpackagecreate')->name('admin.order.createpackage');
    Route::post('/order/storepackage/{key}', 'OrderController@orderpackagestore')->name('admin.order.storepackage');
    Route::get('/order/editpackage/{key}/{id}', 'OrderController@orderpackageedit')->name('admin.order.editpackage');
    Route::post('/order/updatepackage/{key}/{id}', 'OrderController@orderpackageupdate')->name('admin.order.updatepackage');
    Route::get('/order/deletepackage/{key}/{id}', 'OrderController@orderpackagedelete')->name('admin.order.detelepackage');

    Route::get('/learner/index', 'LearnerController@index')->name('admin.learner.index');
    Route::get('/learner/create', 'LearnerController@create')->name('admin.learner.create');
    Route::get('/learner/edit/{id}', 'LearnerController@edit')->name('admin.learner.edit');
    Route::post('/learner/store', 'LearnerController@store')->name('admin.learner.store');
    Route::get('/learner/delete/{id}', 'LearnerController@destroy')->name('admin.learner.delete');
    Route::post('/learner/update/{id}', 'LearnerController@update')->name('admin.learner.update');

    Route::get('/package/index', 'PackageController@index')->name('admin.package.index');
    Route::get('/package/create', 'PackageController@create')->name('admin.package.create');
    Route::get('/package/edit/{id}', 'PackageController@edit')->name('admin.package.edit');
    Route::post('/package/store', 'PackageController@store')->name('admin.package.store');
    Route::get('/package/delete/{id}', 'PackageController@destroy')->name('admin.package.delete');
    Route::post('/package/update/{id}', 'PackageController@update')->name('admin.package.update');
    Route::post('/package/upload', 'PackageController@upload')->name('admin.package.upload');
    Route::get('/package/show/{slug}', 'PackageController@show')->name('admin.package.show');
    Route::get('/package/duplicate/{id}', 'PackageController@duplicate')->name('admin.package.duplicate');



    Route::get('/Transaction/index', 'TransactionController@index')->name('admin.transaction.index');
    Route::get('/Transaction/create', 'TransactionController@create')->name('admin.transaction.create');
    Route::get('/Transaction/store', 'TransactionController@store')->name('admin.transaction.store');
    Route::get('/Transaction/show', 'TransactionController@show')->name('admin.transaction.show');
    Route::get('/Transaction/packagelist', 'TransactionController@packagelist')->name('admin.transaction.packagelist');
    Route::get('/Transaction/addwalletmoney', 'TransactionController@AddWalletMoney')->name('admin.transaction.addwalletmoney');
    Route::get('/Transaction/checkcallbackwalletmoney', 'TransactionController@CheckCallBackWalletMoney')->name('admin.transaction.checkcallbackwalletmoney');

    

    Route::get('/vote/create', 'VoteController@create')->name('admin.vote.create');
    Route::post('/vote/store', 'VoteController@store')->name('admin.vote.store');
    Route::post('/vote/update/{id}', 'VoteController@update')->name('admin.vote.update');
    Route::get('/vote/index', 'VoteController@index')->name('admin.vote.index');
    Route::get('/vote/edit/{id}', 'VoteController@edit')->name('admin.vote.edit');
    Route::get('/vote/delete/{id}', 'VoteController@destroy')->name('admin.vote.delete');
    Route::get('/vote/showmore/{id}', 'VoteController@showmore')->name('admin.vote.showmore');



    Route::get('/course/index/{id}', 'CourseController@index')->name('admin.course.index');
    Route::get('/course/create', 'CourseController@create')->name('admin.course.create');
    Route::post('/course/store', 'CourseController@store')->name('admin.course.store');
    Route::get('/course/edit/{id}', 'CourseController@edit')->name('admin.course.edit');
    Route::post('/course/update/{id}', 'CourseController@update')->name('admin.course.update');
    Route::get('/course/delete/{id}', 'CourseController@destroy')->name('admin.course.delete');
    Route::get('/course/duplicate/{id}', 'CourseController@duplicate')->name('admin.course.duplicate');
    Route::get('/course/repair', 'CourseController@repair')->name('admin.course.repair');
    Route::get('/course/list/{id}', 'CourseController@list')->name('admin.course.list');

    Route::get('/error/index', 'ErrorController@index')->name('admin.errors.index');
    Route::get('/error/show', 'ErrorController@show')->name('admin.errors.show');
    Route::get('/error/delete', 'ErrorController@destroy')->name('admin.errors.delete');

    Route::get('/pages/index', 'PagesController@index')->name('admin.pages.index');
    Route::get('/pages/create', 'PagesController@create')->name('admin.pages.create');
    Route::post('/pages/store', 'PagesController@store')->name('admin.pages.store');
    Route::get('/pages/edit/{id}', 'PagesController@edit')->name('admin.pages.edit');
    Route::post('/pages/update/{id}', 'PagesController@update')->name('admin.pages.update');
    Route::get('/pages/delete/{id}', 'PagesController@destroy')->name('admin.pages.delete');
    Route::post('/pages/upload', 'PagesController@upload')->name('admin.pages.upload');


    Route::get('/routing/index', 'RoutingController@index')->name('admin.routing.index');
    Route::get('/routing/create', 'RoutingController@create')->name('admin.routing.create');
    Route::post('/routing/store', 'RoutingController@store')->name('admin.routing.store');
    Route::get('/routing/edit/{id}', 'RoutingController@edit')->name('admin.routing.edit');
    Route::post('/routing/update/{id}', 'RoutingController@update')->name('admin.routing.update');
    Route::get('/routing/delete/{id}', 'RoutingController@destroy')->name('admin.routing.delete');
    Route::post('/routing/upload', 'RoutingController@upload')->name('admin.routing.upload');

});

Route::group(['prefix' => 'user','namespace' => 'User','middleware'=>'auth'], function() 
{
    Route::get('/home', 'HomeController@index')->name('user.home');

    Route::get('/home/index', 'HomeController@index')->name('user.home');

    Route::get('/Profile/edit/', 'ProfileController@edit')->name('user.profile.edit');
    Route::post('/Profile/update/{id}', 'ProfileController@update')->name('user.profile.update');

    Route::get('/learner/edit/{id}', 'LearnerController@edit')->name('user.learner.edit');
    Route::post('/learner/update/{id}', 'LearnerController@update')->name('user.learner.update');

    Route::get('/Transaction/index', 'TransactionController@index')->name('user.transaction.index');
    Route::get('/Transaction/create', 'TransactionController@create')->name('user.transaction.create');
    Route::get('/Transaction/store', 'TransactionController@store')->name('user.transaction.store');
    Route::get('/Transaction/show', 'TransactionController@show')->name('user.transaction.show');
    Route::get('/Transaction/packagelist', 'TransactionController@packagelist')->name('user.transaction.packagelist');
   
    Route::post('/ReportVotes/store/{id}', 'ReportVotesController@store')->name('user.reportvotes.store');

    Route::post('/Notification/create/{id}', 'NotificationController@create')->name('user.Notification.create');
    Route::post('/Notification/store/{id}', 'NotificationController@store')->name('user.Notification.store');
    Route::post('/Notification/edit/{id}', 'NotificationController@edit')->name('user.Notification.edit');
    Route::post('/Notification/update/{id}', 'NotificationController@update')->name('user.Notification.update');



});

Auth::routes();