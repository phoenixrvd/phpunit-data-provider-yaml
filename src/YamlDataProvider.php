<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

trait YamlDataProvider
{

    /**
     * @param string $testMethodName
     * @return array
     *
     * @throws FixtureFileIsEmptyException
     * @throws FixtureFileNotFoundException
     * @throws FixtureFileIsInvalidException
     */
    public function yamlDataProvider($testMethodName)
    {
        $reflection = new FixturesLoader($this);
        return $reflection->loadDataSets($testMethodName);
    }

}