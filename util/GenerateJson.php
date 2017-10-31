<?php
namespace Util;

// this class name is a misnomer at present.
// the comment in generateFiles indicates
// that it will also be used to generate the
// migration files. some class should utilize
// composition and instantiate an instance of
// this class and an instance of a third class
// whose purpose is to generate the migration
// files. the client class should probably
// be called DatasetGenerator, and DatasetGenerator
// and its children should be renamed.
// This should probably be called JsonGenerator
class GenerateJson {
    private $jDir = __dir__ . "/jsonfiles";
    private $targetDatasets = [
        "spells"
    ];

    public function __construct (array $targetDatasets = []) {
        if (is_array($targetDatasets) && (count($targetDatasets) > 0)) {
            $this->targetDatasets = $targetDatasets;
        }

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
