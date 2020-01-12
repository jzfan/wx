<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/admin');

Route::namespace('\App\Wx\Controllers')->prefix('wx')->group(function () {

    Route::group(['middleware' => ['web']], function () {
        Route::any('server', 'ServerController@index');

        Route::group(['middleware' => ['wechat.oauth:default,snsapi_userinfo']], function () {
            Route::resource('articles', 'ArticleController');
            Route::get('ucenter', 'UcenterController@index');
            Route::get('card/edit', 'CardController@edit');
            Route::put('card', 'CardController@update');
        });
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::post('/img-upload', 'UploaderController@store');
});

Auth::routes(['register' => false]);

Route::get('/news', 'HomeController@news')->name('news');

Route::middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index');
        Route::get('plugins', 'DashboardController@plugins');
        Route::get('chart/users', 'ChartController@users');
        Route::get('export/users', 'ExportController@users');
        Route::resource('users', 'UserController');
        Route::resource('admins', 'AdminController');
        Route::resource('articles', 'ArticleController');
    });
