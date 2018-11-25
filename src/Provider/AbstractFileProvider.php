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

        if (!file_exists($fileGlobalPath)) {
            throw $this->makeError("Fixture file not found [$fileGlobalPath]");
        }

        if (filesize($fileGlobalPath) === 0) {
            throw $this->makeError("Fixture file is empty [$fileGlobalPath]");
        }

        $dataSets = $this->getDataSets($fileGlobalPath);
        if (!$this->isDataPartValid($dataSets)) {
            throw $this->makeError("Fixture file has no data sets  [$fileGlobalPath]");
        }

        foreach ($dataSets as $dataSetName => $dataSet) {
            if (!$this->isDataPartValid($dataSet)) {
                throw $this->makeError("Fixture file has no data sets  [$fileGlobalPath]");
            }
        }

        return $dataSets;
    }

    /**
     * @param string $fileGlobalPath
     * @return array
     * @throws InvalidSetException
     */
    abstract protected function getDataSets($fileGlobalPath);

    protected function isDataPartValid($dataSetPart)
    {
        return !empty($dataSetPart) && \is_array($dataSetPart);
    }

    protected function makeError($validationFailMessage)
    {
        return new InvalidSetException($validationFailMessage);
    }

    /**
     * @param string $testMethodName
     * @return string
     */
    protected function getFixtureGlobalFilePath($testMethodName)
    {
        $fixtureFileName = implode('.', [
            $testMethodName,
            'fixture',
            $this->getFileExtension()
        ]) ;

        $classFilePath = $this->reflection->getFileName();
        $className = $this->reflection->getShortName();

        $fileGlobalPath = implode('/', [
            \dirname($classFilePath),
            $className . 'Fixtures',
            $fixtureFileName,
        ]);

        return $fileGlobalPath;
    }

    /**
     * @return string
     */
    abstract protected function getFileExtension();

}