<?php
namespace Util;

class SchoolsDatasetGenerator extends DatasetGenerator {
    public function __construct () {
        parent::__construct();
        $this->urlTemplate = 'http://www.dnd5eapi.co/api/magic-schools/<id>/';
        $this->jsonFileName = 'schools.json';
        $this->generateKeyCollection();
    }

    private function generateKeyCollection () {
        for ($i=1; $i<=8; $i++) {
            $this->keyCollection[] = $i;

        }
    }
}
