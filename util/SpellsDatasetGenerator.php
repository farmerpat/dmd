<?php
namespace Util;

class SpellsDatasetGenerator extends DatasetGenerator {
    public function __construct () {
        parent::__construct();

        $this->urlTemplate = 'http://www.dnd5eapi.co/api/spells/<id>/';
        $this->jsonFileName = 'spells.json';
        $this->generateKeyCollection();

        $this->jsonFilters = [
            function ($json) {
                $json = json_decode($json,true);

                if (is_array($json) && array_key_exists('school', $json)) {
                    $school = $json['school'];

                    if (is_array($school) && array_key_exists('url', $school)) {
                        $schoolId = 0;
                        $url = $school['url'];
                        preg_match_all('!\d+!', $url, $matches);

                        if (is_array($matches) && (count($matches) > 0)) {
                            $matches = $matches[0];

                            if (is_array($matches) && (count($matches) > 0)) {
                                $schoolId = intval($matches[1]);

                            }
                        }

                        $json['school'] = $schoolId;
                    }
                }

                return json_encode($json);
            }
        ];
    }

    private function generateKeyCollection () {
        // smallest id is 1
        // largest is 305
        for ($i=1; $i<=305; $i++) {
            $this->keyCollection[] = $i;

        }
    }
}
