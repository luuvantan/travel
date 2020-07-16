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
Auth::routes();
Route::group(['middleware' => 'travel'], function () {
    Route::group(['prefix'=>'admin'], function () {
        // Dashboard
        Route::get('dashboard','admin\DashboardController@index')->name('admin.dashboard');

        // Admin
        Route::get('post', 'admin\PostController@index')->name('admin.post.list');
        Route::get('post/change-status/{id}', 'admin\PostController@changeStatus')->name('admin.post.change-status');
        Route::delete('post/{id}', 'admin\PostController@destroy')->name('admin.post.delete');

        // Comment
        Route::get('comment', 'admin\CommentController@index')->name('admin.comment.list');
        Route::delete('comment', 'admin\CommentController@destroy')->name('admin.comment.delete');
    });

});

Route::get('/experiences/food-and-drink', 'ExperienceController@foodAndDrink')->name('experiences.food-and-drink');
Route::get('/experiences/travel-hand-book', 'ExperienceController@travelHandBook')->name('experiences.travel-hand-book');
Route::get('/experiences/information', 'ExperienceController@information')->name('experiences.information');
Route::get('/search', 'PostController@searchByValue')->name('autocomplete');
Route::get('/travels/northern', 'TravelController@northern')->name('travels.northern');
Route::get('/travels/central', 'TravelController@central')->name('travels.central');
Route::get('/travels/southern', 'TravelController@southern')->name('travels.southern');
Route::get('/post/{title}.{id}', 'PostController@pagePost')->name('page.post');

Route::resources([
    'homes' => 'HomeController',
    'posts' => 'PostController',
    'indexs' => 'IndexController',
    'experiences' => 'ExperienceController',
    'travels' => 'TravelController'
]);



