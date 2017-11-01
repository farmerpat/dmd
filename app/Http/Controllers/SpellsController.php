<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpellsController extends Controller {
    public function index () {
        $spells = \App\Spell::spellsWithSchoolId();

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
