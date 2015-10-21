<?php

// Route::get('/', function(){
//     return view('welcome');
// });
// 

Route::get('/', 'EagleController@index');
Route::get('install', 'EagleController@make');
