<?php

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
