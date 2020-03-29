<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

// resources routes
Route::resource('header', 'HeaderController')->only(['edit', 'update']);

// laravel auth routes
Route::get('/', 'IndexController@main');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
