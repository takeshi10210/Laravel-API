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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('index','IndexController@index');

Route::post('auth', 'AuthenticateController@authenticate');

Route::group(['middleware' => 'jwt.auth' ],function(){     //由token保護的路由
    Route::get('/index','IndexController@index');//載入文章列表
	Route::post('/index','IndexController@index');//(編輯/修改)文章列表

	Route::get('/new','Indexcontroller@new_post');//載入新增文章頁面
	Route::post('/new','Indexcontroller@insert');//新增文章

	Route::get('/re','Indexcontroller@reply');//載入回覆頁面
	Route::post('/re','Indexcontroller@reply');//(新增/編輯)回覆頁面
});

