<?php

// Frontend Routes
Route::name('frontend.')->group(function () {
    include_route_files(__DIR__.'/frontend/');
});

// Backend Routes
Route::middleware(['admin'])->name('admin.')->group(function () {
    /*
     * These routes need dashboard.read permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Super Administrator and Administrator has all permissions so
     * you do not have to specify the Super Administrator or Administrator
     * role everywhere. These routes can not be hit if the password is expired.
     */
    include_route_files(__DIR__.'/backend/');
});
