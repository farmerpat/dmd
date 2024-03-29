<?php
namespace Util;

// instance of the static factory generator pattern
final class DatasetGeneratorFactory {
    public static function generate (string $dsType) : DatasetGenerator {
        $dg = null;

        if ($dsType == 'spells') {
            $dg = new SpellsDatasetGenerator;
        } else if ($dsType == 'schools') {
            $dg = new SchoolsDatasetGenerator;
        }

        if ($dg == null) {
            throw new \InvalidArgumentException('invalid DatasetGenerator type requested');
        }

        return $dg;
    }
}
?>
