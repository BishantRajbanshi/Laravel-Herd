<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'this is landing page';
    return view('welcome');
});
