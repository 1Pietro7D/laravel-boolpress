<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// rotta generata da laravel
// Route::get('/home', 'HomeController@index')->name('home');

// middleware è un software che fa da intermediario usando il buon Auth (che viene usato in tutti i file nella cartella Admin)
Route::middleware('auth')
    // namespace 'Admin': (controller inseriti in sottocatella Admin)
    ->namespace('Admin')
    // name: nome delle rotte che inizia con 'admin'
    ->name('admin.')
    // prefix: tutti gli url delle rotte che iniziano con 'admin'
    ->prefix('admin')
    // al group nel get '/' finiranno tutte le rotte davanti, potrebberò esserci più rotte, per questo il group
    ->group(function(){
        Route::get('/', 'HomeController@Index')->name('home');
    });
