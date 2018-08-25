<?php

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
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/weather', 'WeatherController@weather')->name("weather");
Route::get('/feedbacks', 'FeedbackController@get_feedbacks')->name("feedbacks");
Route::get('/new_feedback', 'FeedbackController@new_feedback')->name("new_feedback");
Route::post('/new_feedback', 'FeedbackController@new_feedback')->name("new_feedback");
