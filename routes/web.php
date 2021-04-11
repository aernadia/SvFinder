<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//custom logout for user so that all session may not be destroyed
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    //Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    
    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Register routes
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});

Route::prefix('supervisor')->group(function () {
    //Dashboard route
    Route::get('/', 'SupervisorController@index')->name('supervisor.dashboard');
    
    // Login routes
    Route::get('/login', 'Auth\SupervisorLoginController@showLoginForm')->name('supervisor.login');
    Route::post('/login', 'Auth\SupervisorLoginController@login')->name('supervisor.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\SupervisorLoginController@logout')->name('supervisor.logout');

    // Register routes
    Route::get('/register', 'Auth\SupervisorRegisterController@showRegistrationForm')->name('supervisor.register');
    Route::post('/register', 'Auth\SupervisorRegisterController@register')->name('supervisor.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\SupervisorForgotPasswordController@showLinkRequestForm')->name('supervisor.password.request');
    Route::post('/password/email', 'Auth\SupervisorForgotPasswordController@sendResetLinkEmail')->name('supervisor.password.email');
    Route::get('/password/reset/{token}', 'Auth\SupervisorResetPasswordController@showResetForm')->name('supervisor.password.reset');
    Route::post('/password/reset', 'Auth\SupervisorResetPasswordController@reset')->name('supervisor.password.update');
});

Route::prefix('lecturer')->group(function () {
    //Dashboard route
    Route::get('/', 'LecturerController@index')->name('lecturer.dashboard');
    
    // Login routes
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('lecturer.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('lecturer.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\LecturerLoginController@logout')->name('lecturer.logout');

    // Register routes
    Route::get('/register', 'Auth\LecturerRegisterController@showRegistrationForm')->name('lecturer.register');
    Route::post('/register', 'Auth\LecturerRegisterController@register')->name('lecturer.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\LecturerForgotPasswordController@showLinkRequestForm')->name('lecturer.password.request');
    Route::post('/password/email', 'Auth\LecturerForgotPasswordController@sendResetLinkEmail')->name('lecturer.password.email');
    Route::get('/password/reset/{token}', 'Auth\LecturerResetPasswordController@showResetForm')->name('lecturer.password.reset');
    Route::post('/password/reset', 'Auth\LecturerResetPasswordController@reset')->name('lecturer.password.update');
});