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
    // return view('example1');
    return redirect()->route('login');
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

        Route::get('users/change-status/{id}', 'admin\UserController@changeStatus')->name('users.change-status');
        Route::resources([
            'users' => 'admin\UserController',
        ]);
    });

});
Route::group(['prefix'=>'experiences'], function() {
    Route::get('/food-and-drink', 'ExperienceController@foodAndDrink')->name('experiences.food-and-drink');
    Route::get('/travel-hand-book', 'ExperienceController@travelHandBook')->name('experiences.travel-hand-book');
    Route::get('/information', 'ExperienceController@information')->name('experiences.information');
});
Route::group(['prefix'=>'travels'], function() {
    Route::get('/northern', 'TravelController@northern')->name('travels.northern');
    Route::get('/central', 'TravelController@central')->name('travels.central');
    Route::get('/southern', 'TravelController@southern')->name('travels.southern');
});

Route::group(['prefix'=>'profile'], function() {
    Route::get('/{email}', 'ProfileController@showProfile')->name('profile.showProfile');
    Route::get('/editProfile/{id}', 'ProfileController@editProfile')->name('profile.editProfile');
    Route::patch('/updateProfile/{id}', 'ProfileController@updateProfile')->name('profile.updateProfile');
});

Route::get('/aboutMe', 'HomeController@aboutMe')->name('aboutMe');
Route::get('/search', 'PostController@searchByValue')->name('autocomplete');
Route::get('/post/{title}.{id}', 'PostController@pagePost')->name('page.post');
Route::post('/vote/addVote', 'VoteController@addVote')->name('vote.addVote');
Route::get('/vote/showVote', 'VoteController@showVote')->name('vote.showVote');
Route::post('/comment/addComment', 'CommentController@addComment')->name('comment.addComment');
Route::get('/comment/showComment', 'CommentController@showComment')->name('comment.showComment');
Route::delete('post', 'PostController@destroy')->name('post.delete');
Route::get('notification', 'SendNotificationController@create')->name('notification.create');
Route::post('notification', 'SendNotificationController@store')->name('notification.store');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/comment/addResponseComment', 'CommentController@addResponseComment')->name('comment.addResponseComment');
});

Route::resources([
    'homes' => 'HomeController',
    'posts' => 'PostController',
    'experiences' => 'ExperienceController',
    'travels' => 'TravelController'
]);



