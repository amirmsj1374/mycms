<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

// resources routes
Route::resource('headers', 'HeaderController')->only(['edit', 'update']);
Route::resource('footers', 'FooterController')->only(['edit', 'update']);

Route::get('/', 'IndexController@main');
Route::post('message', 'IndexController@store_message');
Route::get('messages', 'MessageController@index');
Route::get('messages/delete/{message}', 'MessageController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
