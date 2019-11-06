<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
  function() {

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('', function () {
            return view('dashboard.index');
        })->name('index');

        // categories routes
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('', 'CategoriesController@index')->name('index');
            Route::get('create', 'CategoriesController@create')->name('create');
            Route::post('store', 'CategoriesController@store')->name('store');
            Route::get('{id}/edit', 'CategoriesController@edit')->name('edit');
            Route::put('{id}', 'CategoriesController@update')->name('update');
            Route::delete('{id}', 'CategoriesController@destroy')->name('destroy');
        });

        // products routes
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('', 'ProductsController@index')->name('index');
            Route::get('create', 'ProductsController@create')->name('create');
            Route::post('store', 'ProductsController@store')->name('store');
            Route::get('{id}/edit', 'ProductsController@edit')->name('edit');
            Route::put('{id}', 'ProductsController@update')->name('update');
            Route::delete('{id}', 'ProductsController@destroy')->name('destroy');
        });

        // clients routes
        Route::prefix('clients')->name('clients.')->group(function () {
            Route::get('', 'ClientsController@index')->name('index');
            Route::get('create', 'ClientsController@create')->name('create');
            Route::post('store', 'ClientsController@store')->name('store');
            Route::get('{id}/edit', 'ClientsController@edit')->name('edit');
            Route::put('{id}', 'ClientsController@update')->name('update');
            Route::delete('{id}', 'ClientsController@destroy')->name('destroy');

            // orders
                // using {client} parameter not {id} to use Client $client object in controller method
            Route::get('{client}/order/create', 'OrdersController@create')->name('order.create');
            Route::post('{client}/order', 'OrdersController@store')->name('order.store');
            Route::put('{client}/order/{order}', 'OrdersController@update')->name('order.update');
        });

        // orders
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', 'OrdersController@index')->name('index');
            Route::get('/{order}', 'OrdersController@show')->name('show');
            Route::get('{order}/edit', 'OrdersController@edit')->name('edit');

            Route::delete('/{order}', 'OrdersController@destroy')->name('destroy');
        });

        // admins routes
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('', 'UsersController@index')->name('index');
            Route::get('create', 'UsersController@create')->name('create');
            Route::post('store', 'UsersController@store')->name('store');
            Route::get('{id}/edit', 'UsersController@edit')->name('edit');
            Route::put('{id}', 'UsersController@update')->name('update');
            Route::delete('{id}', 'UsersController@destroy')->name('destroy');
        });
    });
});