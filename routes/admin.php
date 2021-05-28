<?php

use Illuminate\Support\Facades\Route;
Route::group([
    'middleware' => ['isadmin'],
    'prefix' => 'admin'
] , function (){

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('groups', App\Http\Controllers\GroupsController::class);

    Route::resource('subjects', App\Http\Controllers\SubjectsController::class);

    Route::resource('questions', App\Http\Controllers\QuestionsController::class);

    Route::resource('contests', App\Http\Controllers\ContestController::class);

    Route::get('contests/{id}/user/{user_id}', [\App\Http\Controllers\ContestController::class, 'result'])->name('result');

    Route::resource('contestQuestions', App\Http\Controllers\ContestQuestionsController::class);

    Route::resource('contestUsers', App\Http\Controllers\ContestUsersController::class);

    Route::resource('contestHistories', App\Http\Controllers\ContestHistoriesController::class);

    Route::resource('users', App\Http\Controllers\UsersController::class);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
