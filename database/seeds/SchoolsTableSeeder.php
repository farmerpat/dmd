<?php
// run with
// $ php artisan db:seed --class=SpellsTableSeeder

use Illuminate\Database\Seeder;
use Util\GenerateJson;

class SchoolsTableSeeder extends Seeder {
    private $jsonFile = __dir__ . '/../../util/jsonfiles/schools.json';

    public function run() {
        if (! file_exists($this->jsonFile)) {
            $gj = new GenerateJson([
                'schools'
            ]);

            $gj->generateFiles();
        }

        \DB::table('schools')->truncate();
        \DB::table('schools')->insert(
            $this->generateDataArray()

        );
    }

    public function generateDataArray () {
        $entries = [];
        $handle = fopen($this->jsonFile, 'r');

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $thisEntry = [];

                $json = json_decode($line, true);

                if ($json) {
                    $thisEntry = [
                        'id' => $json['index'],
                        'name' => $json['name'],
                        'desc' => $json['desc'],
                        'created_at' => DB::raw('now()'),
                        'updated_at' => DB::raw('now()')
                    ];

                    $entries[] = $thisEntry;
                }
            }

            fclose($handle);
        }

        return $entries;
    }
}
