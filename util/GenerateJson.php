<?php
namespace Util;

class GenerateJson {
    private $jDir = __dir__ . "/jsonfiles";
    private $targetDatasets = [
        "spells"
    ];

    public function __construct () {
        if (! file_exists($this->jDir)) {
            if (! mkdir($this->jDir) ) {
                throw new \RuntimeException("unable to create directory {$jDir}");

            }
        }
    }

    public function generateFiles () {
        foreach ($this->targetDatasets as $targetType) {
            // this factory is going to return
            // a subclass of DatasetGenerator
            // all DatasetGenerators will have a url
            // with a key placeholder
            // and at must implement the methods used below
            // maybe they will have to implement an interface
            // that presents all/some of the methods below instead
            $target = DatasetGeneratorFactory::generate($targetType);
            // maybe pass jDir to the factory instead...
            $target->setTargetDirectory($this->jDir);
            $target->generateJsonFile();
            //$target->generateMigration();

        }
    }
}
?>
