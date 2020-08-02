<?php

Route::post('register', 'RegisterUserController@register');

Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'auth'], static function ($router) {
    $router->get('profile', 'UserController@profile');
    $router->put('/', 'UserController@update');
});
