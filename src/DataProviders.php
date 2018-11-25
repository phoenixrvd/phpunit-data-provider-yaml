<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

use PhoenixRVD\PHPUnitDataProviderYAML\Provider\Json;
use PhoenixRVD\PHPUnitDataProviderYAML\Provider\Php;
use PhoenixRVD\PHPUnitDataProviderYAML\Provider\Yaml;

trait DataProviders
{
    public function yamlDataProvider($testMethodName)
    {
        return (new Yaml($this))->getFixtures($testMethodName);
    }

    public function jsonDataProvider($testMethodName)
    {
        return (new Json($this))->getFixtures($testMethodName);
    }

    public function phpDataProvider($testMethodName)
    {
        return (new Php($this))->getFixtures($testMethodName);
    }
}
