<?php

use App\Http\Controllers\Webhooks\SyncListingsController;
use App\Http\Controllers\Webhooks\SyncUserController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Tags
    Route::apiResource('tags', 'TagsApiController');

    // Jci Chapter
    Route::apiResource('jci-chapters', 'JciChapterApiController');
});

Route::group(['prefix' => 'webhooks', 'as' => 'webhook.','namespace' => 'Webhooks'], function () {
    Route::get('new-users', [SyncUserController::class, 'index'])->name('index');
    Route::post('new-users', [SyncUserController::class, 'store'])->name('store');

    Route::get('listings', [SyncListingsController::class, 'index'])->name('index');
});
