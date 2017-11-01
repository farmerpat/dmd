<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolsController extends Controller {
    public function index () {
        $schools = \App\School::all();

        return view('school.index', [
            'schools' => $schools
        ]);
    }

    public function show ($id) {
        $school = \App\School::find($id);

        return view('school.show', [
            'school' => $school
        ]);
    }
}
