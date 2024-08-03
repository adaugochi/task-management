<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'tasks'], function () {
    Route::post('/save', [\App\Http\Controllers\TaskController::class, 'save'])->name('task.save');
    Route::delete('/delete', [\App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');
    Route::post('/reorder', [\App\Http\Controllers\TaskController::class, 'reorder'])->name('task.reorder');

});
