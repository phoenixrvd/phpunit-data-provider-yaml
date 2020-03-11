<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML\Provider;

use PHPUnit\Framework\TestCase;

abstract class AbstractFileProvider
{
    private $reflection;

    /**
     * AbstractFileAdapter constructor.
     * @param TestCase $testCaseObject
     * @throws \ReflectionException
     */
    public function __construct($testCaseObject)
    {
        $this->reflection = new \ReflectionClass($testCaseObject);
    }

    /**
     * @param string $methodName
     * @return array
     * @throws InvalidSetException
     */
    public function getFixtures($methodName)
    {
        $fileGlobalPath = $this->getFixtureGlobalFilePath($methodName);

        $dataSets = $this->getDataSets($fileGlobalPath);
        $this->validateDataPart($dataSets, "Fixture file has no data sets  [$fileGlobalPath]");

        foreach ($dataSets as $dataSetName => $dataSet) {
            $this->validateDataPart($dataSet, "Fixture file has no data sets  [$fileGlobalPath]");
        }

        return $dataSets;
    }

    /**
     * @param string $fileGlobalPath
     * @return array
     * @throws InvalidSetException
     */
    abstract protected function getDataSets($fileGlobalPath);

    /**
     * @param mixed $dataSetPart
     * @param string $errorMessage
     * @throws InvalidSetException
     */
    protected function validateDataPart($dataSetPart, $errorMessage)
    {
        if(empty($dataSetPart) || !\is_array($dataSetPart)) throw $this->makeError($errorMessage);
    }

    protected function makeError($validationFailMessage)
    {
        return new InvalidSetException($validationFailMessage);
    }

    /**
     * @param string $testMethodName
     * @return string
     * @throws InvalidSetException
     */
    protected function getFixtureGlobalFilePath($testMethodName)
    {
        $fixtureFileName = implode('.', [
            $testMethodName,
            'fixture',
            $this->getFileExtension(),
        ]);

        $classFilePath = $this->reflection->getFileName();
        $className = $this->reflection->getShortName();

        $fileGlobalPath = implode('/', [
            \dirname($classFilePath),
            $className.'Fixtures',
            $fixtureFileName,
        ]);

        if (! file_exists($fileGlobalPath)) {
            throw $this->makeError("Fixture file not found [$fileGlobalPath]");
        }

        if (filesize($fileGlobalPath) === 0) {
            throw $this->makeError("Fixture file is empty [$fileGlobalPath]");
        }

        return $fileGlobalPath;
    }

    /**
     * @return string
     */
    abstract protected function getFileExtension();
}
