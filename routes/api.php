<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

   // Users
    Route::apiResource('users', 'UsersApiController');

    // Leads
    Route::post('leads/media', 'LeadApiController@storeMedia')->name('leads.storeMedia');
    Route::apiResource('leads', 'LeadApiController');

    // Customers
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomerApiController');

    // Documents
    Route::post('documents/media', 'DocumentsApiController@storeMedia')->name('documents.storeMedia');
    Route::apiResource('documents', 'DocumentsApiController');

    // Providers
    Route::post('providers/media', 'ProvidersApiController@storeMedia')->name('providers.storeMedia');
    Route::apiResource('providers', 'ProvidersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::apiResource('products', 'ProductApiController');
});

Route::post('register', 'Api\RegisterController@register');
Route::post('login', 'Api\RegisterController@login');
 
