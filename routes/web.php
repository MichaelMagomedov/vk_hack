<?php

Route::post('/client', '\\App\\Clients\\Controllers\\ClientController@create');
Route::post('/answer', '\\App\\Test\\Controllers\\AnswerController@save');
Route::get('/test/{id}', '\\App\\Test\\Controllers\\TestController@getById');
Route::get('/',function(){
   return view('index');
});
