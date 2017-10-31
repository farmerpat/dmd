<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return [
        'msg' => 'visit somewhere useful'
    ];
});

Route::get('/spell', function () {
    $spells = DB::table('spells')->get();

    return view('spell.index', [
        'spells' => $spells
    ]);
});

Route::get('/spell/{id}', function ($id) {
    //$spell = new \App\Spell;
    $spell = DB::table('spells')->find($id);

    return view('spell.show', [
        'spell' => $spell
    ]);
});
