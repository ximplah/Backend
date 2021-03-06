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

Route::get('/login','UiController@login');


Route::post('Api/Login','Api@login');
Route::get('Api/getSession','Api@checkAdminSession');
Route::get('Api/Logout','Api@LogOut');
Route::post('Api/AddMember','Api@AddMember');
Route::post('Api/AddBqTender','Api@InputBQTender');
Route::post('Api/InputPersonil','Api@InputPersonil');
Route::post('Api/InputPerlengkapan','Api@InputPerlengkapan');
Route::post('Api/InputLain2','Api@InputLain2');

/**
 * 
 *  UI Routing
 */

 Route::get('/dashboard','UiController@dashboard');
 Route::get('/bq','UiController@BQ');
 Route::get('/bq/tambah','UiController@TambahBq');