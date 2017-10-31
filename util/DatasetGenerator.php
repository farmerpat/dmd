<?php
namespace Util;

abstract class DatasetGenerator {
    private $targetDirectory = __dir__ . '/jsonfiles';
    protected $jsonFileName = '';
    protected $urlTemplate = '';
    protected $urlTemplateKey = '<id>';
    protected $curlInstance = null;
    protected $keyCollection = [];

    public function __construct () {
        $this->curlInstance = curl_init();
    }

    public function __destruct () {
        curl_close($this->curlInstance);
    }

    public function setTargetDirectory (string $targetDirectory) {
        $this->targetDirectory = $targetDirectory;
    }

    protected function queryApi ($keyValue) {
        $url = str_replace($this->urlTemplateKey, $keyValue, $this->urlTemplate);
        curl_setopt($this->curlInstance, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlInstance, CURLOPT_URL, $url);
        $jsonString = curl_exec($this->curlInstance);

        return $jsonString;
    }

    public function generateJsonFile () {
        $fileName = $this->targetDirectory . '/' . $this->jsonFileName;
        $handle = fopen($fileName, 'w');

        if (! $handle) {
            throw new \RuntimeException("unable to open file, {$fileName}");
        }

        // if jsonFileName exists in targetDirectory, do nothing, or override?
        // maybe override should be an option...

        // it might make more sense to just query while
        // incrementing the key until we get back null instead
        // of making classes responsible for generating ids
        foreach ($this->keyCollection as $key) {
            $json = $this->queryApi($key);

            if ($json) {
                fwrite($handle, $json . "\n");
            }
        }

        fclose($handle);
    }
}
?>
