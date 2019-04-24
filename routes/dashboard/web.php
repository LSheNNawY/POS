<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
  function() {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
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
    });
});