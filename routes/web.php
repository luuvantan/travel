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

Route::get('/experiences/food-and-drink', 'ExperienceController@foodAndDrink');
Route::get('/experiences/travel-hand-book', 'ExperienceController@travelHandBook');

Route::resources([
    'homes' => 'HomeController',
    'posts' => 'PostController',
    'indexs' => 'IndexController',
    'experiences' => 'ExperienceController',
    'travels' => 'TravelController'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'PostController@searchByValue')->name('autocomplete');
