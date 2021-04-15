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

Route::middleware('api')->group(function(){
    Route::post('login', 'AuthenticationController@login');
    Route::post('register', 'AuthenticationController@register');
});

Route::group(['middleware' => ['jwt.verify']], function(){

    Route::get('Book', 'ApiController@getAllBooks');
    Route::get('Book/{id}', 'ApiController@getBook');
    Route::post('Book', 'ApiController@createBook');
    Route::put('Book/{id}', 'ApiController@updateBook');
    Route::delete('Book/{id}','ApiController@deleteBook');
});
