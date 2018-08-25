<?php

//Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

//Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::apiResource('product', 'ProductController');
    Route::apiResource('category', 'categoryController');
    Route::apiResource('permission', 'PermissionController');
    Route::apiResource('role', 'RoleController');
    Route::apiResource('user', 'UserController');

    Route::apiResource('color', 'ColorController');
    Route::apiResource('size', 'SizeController');

    Route::apiResource('product-image', 'ProductImageController');
    Route::get('user-action', 'UserActionController@index')->name('user-action.index');
});
