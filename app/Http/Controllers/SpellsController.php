<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Spell;

class SpellsController extends Controller {
    public function index () {
        $spells = \App\Spell::all();

        return view('spell.index', [
            'spells' => $spells
        ]);
    }

    public function show ($id) {
        $spell = \App\Spell::find($id);

        return view('spell.show', [
            'spell' => $spell
        ]);
    }
}
