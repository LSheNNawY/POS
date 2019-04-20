<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
  function() {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', function () {
            return view('dashboard.index');
        })->name('index');
    });

});

