<?php

use App\Http\Controllers\Webhooks\SyncUserController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Locations
    Route::apiResource('locations', 'LocationsApiController');

    // Tags
    Route::apiResource('tags', 'TagsApiController');
});

Route::group(['prefix' => 'webhooks', 'as' => 'webhook.','namespace' => 'Webhooks'], function () {
    Route::post('new-users', [SyncUserController::class, 'store'])->name('store');
});
