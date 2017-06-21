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

Route::get('/index','system\Indexcontroller@index');//載入文章列表
Route::post('/index','system\Indexcontroller@index');//(編輯/修改)文章列表

Route::get('/new','system\Indexcontroller@new_post');//載入新增文章頁面
Route::post('/new','system\Indexcontroller@insert');//新增文章

Route::get('/re','system\Indexcontroller@reply');//載入回覆頁面
Route::post('/re','system\Indexcontroller@reply');//(新增/編輯)回覆頁面

Route::get('/login','system\Indexcontroller@login');
Route::post('/login','system\Indexcontroller@tologin');