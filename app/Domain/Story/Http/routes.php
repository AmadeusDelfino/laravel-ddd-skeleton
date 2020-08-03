<?php

Route::group(['middleware' => 'auth'], static function($router) {
    $router->post('/', 'StoryController@create');
    $router->delete('/{id}', 'StoryController@delete');
});
