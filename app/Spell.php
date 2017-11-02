<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model {
    // the school id should be held in spells table
    // instead of the school name. The id can be parsed
    // from the school url. this would complicate the
    // DatasetGenerator family of utilities though...
    // also, we would still need a join to get the school name
    public static function spellsWithSchoolId () {
        return
            (new static)->
            newQuery()->
            join('schools', 'school', '=', 'schools.id')->
            select('spells.*', 'schools.name as school_name')->
            get();
    }

    //public static function all($columns = ['*']) {
        //return (new static)->newQuery()->get(
            //is_array($columns) ? $columns : func_get_args()
        //);
    //}
}
