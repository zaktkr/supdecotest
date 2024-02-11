<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('/', function () {
        return view('auth.login');
    })->middleware('guest');
    Route::get('/home', 'Frontend\FrontendController@index');

    Auth::routes();
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('show.login.form');


    Route::group(['prefix' => 'rimpub/admin', 'middleware' => 'auth', 'as' => 'admin.', 'namespace' => 'Backend'], function () {
        Route::resource('admins', 'AdminController');
        Route::post('/admins/remove_image', 'AdminController@remove_image')->name('admins.remove_image');
        Route::resource('sliders', 'SliderController');
        Route::post('slider/remove-image', 'SliderController@remove_image')->name('sliders.remove-image');
        Route::resource('logos', 'LogoController');
        Route::post('logo/remove-image', 'LogoController@remove_image')->name('logos.remove-image');
        Route::resource('menus', 'MenuController');
        Route::post('menu/remove-image', 'MenuController@remove_image')->name('menus.remove-image');
        Route::resource('services', 'ServiceController');
        Route::post('service/remove-image', 'ServiceController@remove_image')->name('services.remove-image');

        Route::resource('type_communication', 'TypeCommunicationController');
        Route::post('typeCommunication/remove-image', 'TypeCommunicationController@remove_image')->name('type_communication.remove-image');

        Route::resource('notre_travail', 'NotreTravailController');
        Route::post('notreTravail/remove-image', 'NotreTravailController@remove_image')->name('notre_travail.remove-image');
        Route::get('index', function () {
            return view('empty');
        })->name('index');
    });
});
