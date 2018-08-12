<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

class YamlDataProviderTest extends TestCase
{

    use YamlDataProvider;

    /**
     * @test
     * @throws FixtureFileIsEmptyException
     * @throws FixtureFileNotFoundException
     * @throws FixtureFileIsInvalidException
     */
    public function yamlDataProvider_withValidDataSet()
    {
        $data = $this->yamlDataProvider('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }

}