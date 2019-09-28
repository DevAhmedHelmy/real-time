<?php

use Illuminate\Http\Request;
use App\User;
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



Route::apiResource('/questions','QuestionController');

Route::apiResource('/categories','CategoryController');


Route::apiResource('/questions/{question}/replies','ReplyController');
Route::post('/like/{reply}', 'LikeController@likeIt');
Route::delete('/like/{reply}', 'LikeController@unLikeIt');


Route::post('/notifications','NotificationsController@index');
Route::post('/markAsRead','NotificationsController@markAsRead');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('signup', 'AuthController@signup')->name('signup');
    Route::post('login', 'AuthController@login')->name('login');
    
    Route::post('logout', 'AuthController@logout');
    
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

    

});