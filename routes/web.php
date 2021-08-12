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

Route::get('/', 'PagesController@root')->name('root');
// 添加了邮箱验证功能
//Route::get('/', 'PagesController@root')->name('root')->middleware('verified');

// 用户认证路由
Auth::routes(['verify' => true]);

