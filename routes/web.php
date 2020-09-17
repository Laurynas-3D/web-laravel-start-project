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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// you do not want to return a view from a route
Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});
/*
Route::get('/about', function () {
    return view('pages/about');
});
*/

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an id of '.$id;
});

// create a controller, set the route go to certain controller function and then return the view

// to create a controller, in terminal 'php artisan make:controller PagesController'
// https://youtu.be/sLFNVXY0APk?t=353
Route::get('/', 'Controller@index');
Route::get('/about', 'Controller@about');
Route::get('/services', 'Controller@services');
Route::get('/hw', 'Controller@hw');
Route::get('/welcome', 'Controller@welcome');
Route::get('/testbox', 'Controller@testbox');