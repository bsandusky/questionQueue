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
    return redirect('/questions');
});

/* Question Controller routes */
Route::get('/questions', 'QuestionController@index')->name('questions.index');
Route::post('/questions', 'QuestionController@store')->name('questions.store');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');

/* Answer Controller resources nested under Question */
/** Refactor to include 'only' to avoid dead routes */
Route::resource('questions.answers', 'AnswerController', ['names' => ['store' => 'answers.store'] ])->only(['store']);

