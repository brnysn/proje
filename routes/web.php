<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');

Auth::routes();

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'twofactor']], function () {
    
    Route::get('/', 'HomeController@index')->name('home');
    
    // User
    Route::get('profile', 'UserController@profile')->name('users.profile');
    Route::get('profile/{user_id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('profile/update', 'UserController@update')->name('users.update');

    // Tags
    Route::delete('tags/destroy', 'TagController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagController');

    // Passwords
    Route::delete('passwords/destroy', 'PasswordController@massDestroy')->name('passwords.massDestroy');
    Route::get('passwords/authonticatedIndex', 'PasswordController@authonticatedIndex')->name('passwords.authonticatedIndex');
    Route::resource('passwords', 'PasswordController');

});
