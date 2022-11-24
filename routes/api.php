<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// questo serve per autenticare l'user... per il momento lo teniamo disabilitato
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
 }); */

Route::resource('posts', 'Api\PostController', ['only'=>['index','show']], ['except'=>['edit','update','create','store','destroy']]);
// andiamo a connetterci al controller CRUD associato ai posts -- basta solo only o except, l'ho messo a scopo didattico
// Route::get('/posts', 'Api\PostController@index');
// questa rotta richiama il singolo index nel controller
