<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminClaimController;
use App\Http\Controllers\Admin\AdminFoundItemController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminLostItemController;
use App\Http\Controllers\Admin\AdminMatchingController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminActivityLogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LostItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest / Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Lost Items
Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');
Route::get('/report-lost', [LostItemController::class, 'create'])->name('report.lost');
Route::post('/report-lost', [LostItemController::class, 'store'])->name('report.lost.store');
Route::get('/lost-items/{id}', [LostItemController::class, 'show'])->name('lost-items.show');

// Found Items
Route::get('/found-items', [FoundItemController::class, 'index'])->name('found-items.index');
Route::get('/report-found', [FoundItemController::class, 'create'])->name('report.found');
Route::post('/report-found', [FoundItemController::class, 'store'])->name('report.found.store');
Route::get('/found-items/{id}', [FoundItemController::class, 'show'])->name('found-items.show');

// Claims
Route::get('/claim/{foundItem?}', [ClaimController::class, 'create'])->name('claims.create');
Route::post('/claim', [ClaimController::class, 'store'])->name('claims.store');
Route::get('/claim-status', [ClaimController::class, 'status'])->name('claims.status');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Lost Items CRUD & Matching
        Route::get('/lost-items', [AdminLostItemController::class, 'index'])->name('lost-items.index');
        Route::get('/lost-items/{id}', [AdminLostItemController::class, 'show'])->name('lost-items.show');
        Route::patch('/lost-items/{id}/status', [AdminLostItemController::class, 'updateStatus'])->name('lost-items.update-status');
        Route::delete('/lost-items/{id}', [AdminLostItemController::class, 'destroy'])->name('lost-items.destroy');

        // Found Items CRUD
        Route::get('/found-items', [AdminFoundItemController::class, 'index'])->name('found-items.index');
        Route::get('/found-items/{id}', [AdminFoundItemController::class, 'show'])->name('found-items.show');
        Route::patch('/found-items/{id}/status', [AdminFoundItemController::class, 'updateStatus'])->name('found-items.update-status');
        Route::delete('/found-items/{id}', [AdminFoundItemController::class, 'destroy'])->name('found-items.destroy');

        // Claims Verification
        Route::get('/claims', [AdminClaimController::class, 'index'])->name('claims.index');
        Route::get('/claims/{id}', [AdminClaimController::class, 'show'])->name('claims.show');
        Route::patch('/claims/{id}/status', [AdminClaimController::class, 'updateStatus'])->name('claims.update-status');

        // Smart Manual Matching
        Route::get('/matching', [AdminMatchingController::class, 'index'])->name('matching.index');

        // Categories CRUD
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

        // Locations CRUD
        Route::get('/locations', [AdminLocationController::class, 'index'])->name('locations.index');
        Route::post('/locations', [AdminLocationController::class, 'store'])->name('locations.store');
        Route::put('/locations/{id}', [AdminLocationController::class, 'update'])->name('locations.update');
        Route::delete('/locations/{id}', [AdminLocationController::class, 'destroy'])->name('locations.destroy');

        // Notifications & Activity Logs
        Route::get('/notifications', [AdminNotificationController::class, 'index'])->name('notifications.index');
        Route::patch('/notifications/{id}/read', [AdminNotificationController::class, 'markAsRead'])->name('notifications.mark-read');
        Route::get('/activity-logs', [AdminActivityLogController::class, 'index'])->name('activity-logs.index');
    });
});
