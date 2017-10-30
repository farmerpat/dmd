<?php
namespace Util;

class SpellsDatasetGenerator extends DatasetGenerator {
    public function __construct () {
        parent::__construct();
        $this->urlTemplate = 'http://www.dnd5eapi.co/api/spells/<id>/';
        $this->jsonFileName = 'spells.json';
        $this->generateKeyCollection();
    }

    private function generateKeyCollection () {
        // smallest id is 1
        // largest is 305
        for ($i=1; $i<=305; $i++) {
            $this->keyCollection[] = $i;

        }
    }
}
