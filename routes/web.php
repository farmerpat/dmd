<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/spell', function () {
    $spells = App\Spell::all();

    return view('spell.index', [
        'spells' => $spells
    ]);
});

Route::get('/spell/{id}', function ($id) {
    $spell = App\Spell::find($id);

    return view('spell.show', [
        'spell' => $spell
    ]);
});
