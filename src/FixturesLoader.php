<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

use Symfony\Component\Yaml\Yaml;

class FixturesLoader
{

    private $reflection;

    public function __construct($testCaseObject)
    {
        $this->reflection = new \ReflectionClass($testCaseObject);
    }

    public function loadDataSets($fileBaseName): array
    {
        $fixturesFilePath = $this->getFixtureGlobalFilePath($fileBaseName);
        if (!file_exists($fixturesFilePath)) {
            $message = "Fixture file not found [$fixturesFilePath]";
            throw new FixtureFileNotFoundException($message);
        }

        $yamlContent = file_get_contents($fixturesFilePath);
        if (empty($yamlContent)) {
            $message = "Fixture file is empty [$fixturesFilePath]";
            throw new FixtureFileIsEmptyException($message);
        }

        $dataSetsData = Yaml::parse($yamlContent);

        foreach ($dataSetsData as $dataSetName => $dataSet) {
            if (!\is_array($dataSet)) {
                $message = "Fixture file has no data sets [$fixturesFilePath]";
                throw new FixtureFileIsInvalidException($message);
            }
        }

        return $dataSetsData;
    }

    private function getFixtureGlobalFilePath($fileName): string
    {
        $classFilePath = $this->reflection->getFileName();
        $className = $this->reflection->getShortName();

        return implode('/', [
            \dirname($classFilePath),
            $className . 'Fixtures',
            $fileName . '.fixture.yaml',
        ]);
    }

}