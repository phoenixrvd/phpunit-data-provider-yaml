<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

class DataProvidersTest extends \PHPUnit\Framework\TestCase
{
    use DataProviders;

    /**
     * @test
     */
    public function dataProvider_withValidYamlDataSet()
    {
        $data = $this->yamlDataProvider('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }

    /**
     * @test
     */
    public function dataProvider_withValidJsonDataSet()
    {
        $data = $this->jsonDataProvider('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }

    /**
     * @test
     */
    public function dataProvider_withValidPhpDataSet()
    {
        $data = $this->phpDataProvider('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\Provider\InvalidSetException
     * @expectedExceptionMessageRegExp  /Fixture file not found .+/
     */
    public function loadData_SetsFileNotFoundException()
    {
        $this->yamlDataProvider('NotExistingFile');
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\Provider\InvalidSetException
     * @expectedExceptionMessageRegExp  /Fixture file is empty .+/
     */
    public function loadData_SetsFileIsEmptyException()
    {
        $this->yamlDataProvider('emptyFixtureFile');
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\Provider\InvalidSetException
     * @expectedExceptionMessageRegExp  /Fixture file has no data sets .+/
     */
    public function loadData_EmptyDataSetException()
    {
        $this->phpDataProvider('emptyDataSetFixtureFile');
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\Provider\InvalidSetException
     */
    public function loadData_SetsFixtureFileIsInvalidException()
    {
        $this->yamlDataProvider('invalidFixtureFile');
    }

    /**
     * @test
     */
    public function loadData_withValidFixtures()
    {
        $data = $this->yamlDataProvider('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }
}
