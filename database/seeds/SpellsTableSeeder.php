<?php
// run with
// $ php artisan db:seed --class=SpellsTableSeeder

use Illuminate\Database\Seeder;
use Util\GenerateJson;

class SpellsTableSeeder extends Seeder {
    // should not have to keep track of this file in multiple places...
    //
    private $jsonFile = __dir__ . '/../../util/jsonfiles/spells.json';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // TODO
        // re-examine the relationships between these classes.
        // something about this seems counter-intuitive
        if (! file_exists($this->jsonFile)) {
            $gj = new GenerateJson([
                'spells'
            ]);

            $gj->generateFiles();
        }

        \DB::table('spells')->truncate();
        \DB::table('spells')->insert(
            $this->generateDataArray()

        );
    }

    // should I be using a factory instead?
    // or an abstract factory that creates
    // a factory that points to a specific file?
    // that would be possible if the first line
    // of the file specified the structure of the
    // rest of the json file
    // it looks like laravels factories are for generating
    // data (the only use case i've seen is for generating
    // test data). I think using them to feed the seeder
    // with permenant data is in contrast to the spirit
    // of their intended use.
    // the abstact in my case would be a seederFactory instead
    // it could take the table name and/or spec and the model somehow
    // and the filename that contains the seed data
    public function generateDataArray () {
        $entries = [];
        $handle = fopen($this->jsonFile, 'r');

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $thisEntry = [];

                $json = json_decode($line, true);

                if ($json) {
                    $thisEntry = $this->generateEntryFromJson($json);

                    $entries[] = $thisEntry;
                }
            }

            fclose($handle);
        }

        return $entries;
    }

    private function generateEntryFromJson ($json) {
        $thisEntry = [];

        $thisEntry['id'] = $json['index'];
        $thisEntry['name'] = $json['name'];

        $desc = $json['desc'];

        if (is_array($desc) && (count($desc) > 0)) {
            $desc = implode(';', $desc);
        } else {
            $desc = 'unknown';
        }

        $thisEntry['desc'] = $desc;

        if (array_key_exists('higher_level', $json)) {
            $higherLevel = $json['higher_level'];

            if (is_array($higherLevel) && (count($higherLevel) > 0)) {
                $higherLevel = implode(';', $higherLevel);

            } else {
                $higherLevel = '';

            }
        } else {
            $higherLevel = '';

        }

        $thisEntry['higher_level'] = $higherLevel;

        $thisEntry['page'] = $json['page'];
        $thisEntry['range'] = $json['range'];

        $components = $json['components'];

        if (is_array($components) && (count($components) > 0)) {
            $components = implode(';', $components);
        } else {
            $components = 'unknown';
        }

        $thisEntry['components'] = $components;

        if (array_key_exists('material', $json)) {
            $thisEntry['material'] = $json['material'];
        } else {
            $thisEntry['material'] = 'none';
        }

        $thisEntry['ritual'] = ($json['ritual'] == 'yes') ? true : false;
        $thisEntry['duration'] = $json['duration'];
        $thisEntry['concentration'] = ($json['concentration'] == 'yes') ? true : false;
        $thisEntry['casting_time'] = $json['casting_time'];
        $thisEntry['level'] = $json['level'];

        $school = $json['school'];

        if (is_array($school) && array_key_exists('name', $school)) {
            $school = $school['name'];
        } else {
            $school = 'unknown';
        }

        $thisEntry['school'] = $school;

        $classes = $json['classes'];

        if (is_array($classes) && (count($classes) > 0)) {
            $classNames = [];

            foreach ($classes as $class) {
                if (array_key_exists('name', $class)) {
                    $classNames[] = $class['name'];
                }
            }

            $classes = implode(';', $classNames);
        } else {
            $classes = 'unknown';
        }

        $thisEntry['classes'] = $classes;

        $subClasses = $json['subclasses'];

        if (is_array($subClasses) && (count($subClasses) > 0)) {
            $subClassNames = [];

            foreach ($subClasses as $subClass) {
                if (array_key_exists('name', $subClass)) {
                    $subClassNames[] = $subClass['name'];
                }
            }

            $subClasses = implode(';', $subClassNames);

        } else {
            $subClasses = '';
        }

        $thisEntry['subclasses'] = $subClasses;

        $thisEntry['created_at'] = DB::raw('now()');
        $thisEntry['updated_at'] = DB::raw('now()');

        return $thisEntry;
    }
}
