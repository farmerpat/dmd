<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/spell', 'SpellsController@index');
Route::get('/spell/{id}', 'SpellsController@show');
