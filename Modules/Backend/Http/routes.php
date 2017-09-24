<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Backend\Http\Controllers'], function()
{
    Auth::routes();
    Route::get('/', 'HomeController@index');
    //login
    Route::get('/login','LoginController@index')->name('admin.login');
    Route::post('/login','LoginController@process')->name('admin.process');

    //forgot password
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    //reset password
    Route::post('/password/reset/{token}','ResetPasswordController@reset');
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');

    //logout
    Route::get('/home/logout','HomeController@logout');

    //landingPage
    Route::get('/landing-page', 'LandingPageController@landingPage');

    //room
    Route::group(['prefix' => '/room'], function(){
        Route::get('/create'      , 'RoomController@addNewRoom');
        Route::post('/create'     , 'RoomController@addNewRoom');
        Route::get('/list'        , 'RoomController@getListRoom');
        Route::post('/list/delete', 'RoomController@deleteRoom');
        Route::get('/edit/{id}'   , 'RoomController@editRoom');
        Route::post('/edit'       , 'RoomController@editRoom');
    });

    //promotion
    Route::group(['prefix' => '/promotion'], function(){
        Route::get ('/assign'      , 'PromotionController@assignPromotion');
        Route::post('/assign'      , 'PromotionController@assignPromotion');
        Route::get ('/list'        , 'PromotionController@listPromotion');
        Route::get ('/edit/{id}'   , 'PromotionController@editPromotion');
        Route::post('/edit'        , 'PromotionController@editPromotion');
        Route::post('/list/delete' , 'PromotionController@deletePromotion');
    });

    //package
    Route::group(['prefix' => '/package'], function(){
        Route::get ('/list-sold', 'PackageController@listPackageSold');
        Route::get ('/create-type', 'PackageController@addPackageType');
        Route::post ('/create-type', 'PackageController@addPackageType');
        Route::get ('/list-type', 'PackageController@listPackageType');
        Route::post('/list-type/delete', 'PackageController@deletePackageType');
        Route::get ('/type/edit/{id}', 'PackageController@editPackageType');
        Route::post('/type/edit', 'PackageController@editPackageType');
        Route::get ('/register','PackageController@registerPackage');
        Route::post('/register/get-package-information','PackageController@getPackageInfor');
        Route::post('/register/get-time-period','PackageController@getPeriodTimePackage');
        Route::post('/register','PackageController@registerPackage');
        Route::get ('/refund', 'PackageController@refundPackage');
        Route::post('/refund', 'PackageController@refundPackage');
        Route::get ('/list-refund', 'PackageController@listRefundPackage');
        Route::get ('/list-refund/edit/{id}', 'PackageController@editRefundPackage');
        Route::post('/list-refund/edit', 'PackageController@editRefundPackage');
        Route::post('/list-refund/delete', 'PackageController@deleteRefundPackage');
    });

    //payment
    Route::get ('/payment-schemes', 'PaymentController@paymentSchemes');
    Route::post('/payment-schemes/set-payment-mounthly', 'PaymentController@setPaymentMounthly');
    Route::post('/payment-schemes/set-payment-bi-mounthly', 'PaymentController@setPaymentBiMounthly');
    Route::post('/payment-schemes/set-payment-tri-mounthly', 'PaymentController@setPaymentTriMounthly');

    //Roles
    Route::group(['prefix' => 'role','middleware' => ['role:global_admin']], function() {
        Route::get('/', ['as' => 'role.index', 'uses' => 'RoleController@index']);
        Route::get('/view/{id}', ['as' => 'role.view', 'uses' => 'RoleController@view']);
        Route::get('/edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);
        Route::post('/edit', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);
        Route::get('/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::post('/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::get('/delete/{id}', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);
        Route::get('/pagination/{records}/{search?}', ['as' => 'role.pagination', 'uses' => 'RoleController@pagination']);
    });

    //pagination
    Route::get('/pagination/{current_page}/{total_page}', 'PaginationController@index');

    //Staff
    Route::group(['prefix' => '/staff'], function(){
        Route::get ('/list-therapist', 'StaffController@listTherapist');
    });

    //ongoingPromotion
    Route::group(['prefix' => '/on-going-promotion'], function(){
        Route::get ('/create',  'PromotionController@ongoingPromotion');
        Route::post('/create',  'PromotionController@ongoingPromotion');
        Route::get ('/list'  ,  'PromotionController@listOnGoingPromotion');
        Route::post('/list/delete',  'PromotionController@deleteOnGoingPromotion');
        Route::get ('/edit/{id}'  ,  'PromotionController@editOnGoingPromotion');
        Route::post('/edit'  ,  'PromotionController@editOnGoingPromotion');
    });

    //openingHours
    Route::group(['prefix' => '/operating-hours'], function(){
        Route::get ('/set',  'OperatingHoursController@setOperation');
        Route::post('/set',  'OperatingHoursController@setOperation');
        Route::get ('/list', 'OperatingHoursController@listOperation');
        Route::post('/list/delete','OperatingHoursController@deleteOperation');
        Route::get ('/edit/{id}'  ,'OperatingHoursController@editOperation');
    });


    //resign
    Route::get('/add-resign', 'AdminController@addFireAndResign');
    Route::get('/list-resign', 'AdminController@listFireAndResign');

    //add staff
    Route::get('/add-staff', 'StaffController@addNewStaff');

    //staff resign
    Route::get('/add-resign', 'ResignController@addFireAndResign');
    Route::post('/add-resign', 'ResignController@addFireAndResign');
    Route::get('/list-resign', 'ResignController@listFireAndResign');

    //commisionScheme
    Route::group(['prefix' => '/commission-scheme'], function(){
        Route::get ('/set',  'CommissionSchemeController@setCommission');
        Route::post('/set/getBaseInfo',  'CommissionSchemeController@getBaseInfo');
        Route::post('/set/setBaseModel', 'CommissionSchemeController@setBaseModel');
    });

    //SurveyConfiguration
    Route::group(['prefix' => '/survey-configuration'], function(){
        Route::get ('/set',  'SurveyConfigurationController@setConfig');
        Route::post('/set',  'SurveyConfigurationController@setConfig');
    });


});
