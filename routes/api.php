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

/**
 * AUTH
 */
Route::post('auth/login', ['uses' => 'AuthController@login']);
Route::post('auth/register', ['uses' => 'AuthController@register']);

/**
 * USER
 */
Route::get('me', ['uses' => 'UserController@getUserData']);

/**
 * COLOR
 */
Route::get('colors', ['uses' => 'ColorController@index']);
Route::post('colors', ['uses' => 'ColorController@store']);
Route::patch('colors/{id}', ['uses' => 'ColorController@update']);
Route::delete('colors/{id}', ['uses' => 'ColorController@destroy']);
