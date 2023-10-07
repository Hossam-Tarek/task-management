<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::resource('tasks', TaskController::class)->except(['show']);

