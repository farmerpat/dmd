<?php
namespace Util;

class DatasetGeneratorFactory {
    // returns an instance of a subclass of DatasetGenerator
    public static function generate (string $dsType) {
        $dg = null;

        if ($dsType == 'spells') {
            $dg = new SpellsDatasetGenerator;
        }

        return $dg;
    }
}
?>
