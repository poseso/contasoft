<?php

// All route names are prefixed with 'frontend.'.
Route::domain('{domain}.{tld}')->group(function () {
    Route::name('home')->get('/', function () {
        return view('welcome');
    });
});

