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

/**
 * CATEGORY
 */
Route::get('categories', ['uses' => 'CategoryController@index']);
Route::post('categories', ['uses' => 'CategoryController@store']);
Route::patch('categories/{id}', ['uses' => 'CategoryController@update']);
Route::delete('categories/{id}', ['uses' => 'CategoryController@destroy']);

/**
 * CATEGORY SIZE
 */
Route::get('category/sizes', ['uses' => 'CategorySizeController@index']);
Route::get('category/{id}/sizes', ['uses' => 'CategorySizeController@getSizesByCategory']);
Route::post('category/sizes', ['uses' => 'CategorySizeController@store']);
Route::patch('category/sizes/{id}', ['uses' => 'CategorySizeController@update']);
Route::delete('category/sizes/{id}', ['uses' => 'CategorySizeController@destroy']);

/**
 * POST
 */
Route::get('posts', ['uses' => 'PostController@index']);
Route::post('posts', ['uses' => 'PostController@store']);
Route::patch('posts/{id}', ['uses' => 'PostController@update']);
Route::delete('posts/{id}', ['uses' => 'PostController@destroy']);

/**
 * PRODUCTS
 */
Route::get('products', ['uses' => 'ProductController@index']);
Route::post('products', ['uses' => 'ProductController@store']);
Route::patch('products/{id}', ['uses' => 'ProductController@update']);
Route::delete('products/{id}', ['uses' => 'ProductController@destroy']);

/**
 * POST TRANSACTION
 */
Route::get('post/transactions', ['uses' => 'PostTransactionController@index']);
Route::get('post/transactions/{id}', ['uses' => 'PostTransactionController@index']);
Route::post('post/transactions', ['uses' => 'PostTransactionController@store']);

/**
 * PRODUCTS TRANSACTION
 */
Route::get('product/transactions', ['uses' => 'ProductTransactionController@index']);
Route::get('product/transactions/{id}', ['uses' => 'ProductTransactionController@index']);
Route::post('product/transactions', ['uses' => 'ProductTransactionController@store']);
