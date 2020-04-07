<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;


Route::get('/', 'IndexController@main');
Route::post('message', 'IndexController@store_message');
Route::get('messages', 'MessageController@index');
Route::get('messages/delete/{message}', 'MessageController@destroy');
Route::get('sections/visiblity/{section}', 'SectionController@visiblity');
Route::get('contents/{section}', 'ContentController@edit');

// resources routes
Route::resource('headers', 'HeaderController')->only(['edit', 'update']);
Route::resource('footers', 'FooterController')->only(['edit', 'update']);
Route::resource('sections', 'SectionController')->except(['index', 'show']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
