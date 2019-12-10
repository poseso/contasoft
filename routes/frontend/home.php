<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::domain('{domain}.{tld}')->group(function () {
    Route::name('home')->get('/', function () {
        return view('welcome');
    });
});

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:settings.update');
        Route::patch('profile/update/settings', [SettingsController::class, 'updateUserSettings'])->name('profile.update.settings')->middleware('permission:settings.update');
    });
});

