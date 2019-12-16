<?php

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserLogController;
use App\Http\Controllers\User\UserSocialController;
use App\Http\Controllers\User\UserStatusController;
use App\Http\Controllers\User\UserSessionController;
use App\Http\Controllers\User\UserPasswordController;
use App\Http\Controllers\User\UserConfirmationController;

// All route names are prefixed with 'admin.user.'.
Route::group([
    'as' => 'user.',
    'middleware' => ['role:'.config('access.users.super_admin_role').'|'.config('access.users.admin_role')],
], function () {
    // User Management
    Route::group(['namespace' => 'User'], function () {
        // For DataTables
        Route::get('user/get', [UserController::class, 'getDataTables'])->name('get');

        // User Status'
        Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('deactivated');
        Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('deleted');

        // User CRUD
        Route::get('user', [UserController::class, 'index'])->name('index');
        Route::get('user/create', [UserController::class, 'create'])->name('create');
        Route::post('user', [UserController::class, 'store'])->name('store');

        // Specific User
        Route::group(['prefix' => 'user/{user}'], function () {
            // User
            Route::get('/', [UserController::class, 'show'])->name('show');
            Route::get('edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('/', [UserController::class, 'update'])->name('update');
            Route::delete('/', [UserController::class, 'destroy'])->name('destroy');

            // Account
            Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);

            // Social
            Route::delete('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('social.unlink');

            // Confirmation
            Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('confirm');
            Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('unconfirm');

            // Password
            Route::get('password/change', [UserPasswordController::class, 'edit'])->name('change-password');
            Route::patch('password/change', [UserPasswordController::class, 'update'])->name('change-password.post');

            // Session
            Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('clear-session');

            // Deleted
            Route::get('delete', [UserStatusController::class, 'delete'])->name('delete-permanently');
            Route::get('restore', [UserStatusController::class, 'restore'])->name('restore');
        });
    });

    // Role Management
    Route::group(['namespace' => 'Role'], function () {
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role/{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });

    // User Logs Routes
    Route::group([
        'prefix' => 'logs',
        'as' => 'logs.',
        'middleware' => 'admin',
    ], function () {
        // Logs Management
        Route::group(['namespace' => 'User'], function () {
            // Security Logs
            Route::get('user', [UserLogController::class, 'index'])->name('index');
            Route::get('user/{id}/show', [UserLogController::class, 'show'])->name('show');
//            Route::get('user/{id}/restore', [UserLogController::class, 'restore'])->name('user.restore');
//            Route::delete('user/{id}/destroy', [UserLogController::class, 'destroy'])->name('user.destroy');
//            Route::delete('user', [UserLogController::class, 'deleteAll'])->name('user.deleteall');
        });
    });
});
