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

/* Question Controller Routes */
Route::get('/questions', 'QuestionController@index')->name('questions.index');
Route::post('/questions', 'QuestionController@store')->name('questions.store');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');

/* Answer Controller Resources */
Route::resource('questions.answers', 'AnswerController');

