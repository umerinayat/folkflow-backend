<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('me', 'User\MeController@getMe');


// Route group for authenticated users only
Route::group( [ 'middleware' => ['auth:api'] ], function () {

    // logout
    Route::post('logout', 'Auth\LoginController@logout');

    // User Profile Settings
    Route::put('settings/profile', 'User\SettingsController@updateProfile');
    Route::put('settings/password', 'User\SettingsController@updatePassword');


    // handle files Upload
    Route::post('jobs', 'Jobs\UploadController@upload');


    
    // API Resources
    // -------------------------------------------------

    // Jobs
    Route::apiResource('jobs', 'Jobs\JobsController');
    // Companies
    Route::apiResource('companies', 'Companies\CompaniesController');


});


// Route group for gusests only
Route::group( [ 'middleware' => ['guest:api'] ] , function () {
    
    // User Registeration and Login
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('verification/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('verification/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    
});