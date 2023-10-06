<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dd('admin dashboard');
})->name('home');
