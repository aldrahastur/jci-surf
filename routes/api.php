<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Locations
    Route::apiResource('locations', 'LocationsApiController');

    // Tags
    Route::apiResource('tags', 'TagsApiController');
});
