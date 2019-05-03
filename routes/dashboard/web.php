<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
  function() {

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('', function () {
            return view('dashboard.index');
        })->name('index');

        // users routes
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('', 'UsersController@index')->name('index');
            Route::get('create', 'UsersController@create')->name('create');
            Route::post('store', 'UsersController@store')->name('store');
            Route::get('{id}/edit', 'UsersController@edit')->name('edit');
            Route::put('{id}', 'UsersController@update')->name('update');
            Route::delete('{id}', 'UsersController@destroy')->name('destroy');
        });

        // categories routes
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('', 'CategoriesController@index')->name('index');
            Route::get('create', 'CategoriesController@create')->name('create');
            Route::post('store', 'CategoriesController@store')->name('store');
            Route::get('{id}/edit', 'CategoriesController@edit')->name('edit');
            Route::put('{id}', 'CategoriesController@update')->name('update');
            Route::delete('{id}', 'CategoriesController@destroy')->name('destroy');
        });
    });
});