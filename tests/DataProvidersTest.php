<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

use PhoenixRVD\PHPUnitDataProviderYAML\Provider\InvalidSetException;
use phpDocumentor\Reflection\Types\Void_;

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
     */
    public function loadData_SetsFileNotFoundException()
    {
        $this->expectException(InvalidSetException::class);
        $this->expectExceptionMessagePart('/Fixture file not found .+/');
        $this->yamlDataProvider('NotExistingFile');
    }

    /**
     * @test
     */
    public function loadData_SetsFileIsEmptyException()
    {
        $this->expectException(InvalidSetException::class);
        $this->expectExceptionMessagePart('/Fixture file is empty .+/');
        $this->yamlDataProvider('emptyFixtureFile');
    }

    /**
     * @test
     */
    public function loadData_EmptyDataSetException()
    {
        $this->expectException(InvalidSetException::class);
        $this->expectExceptionMessagePart('/Fixture file has no data sets .+/');
        $this->phpDataProvider('emptyDataSetFixtureFile');
    }

    /**
     * @test
     */
    public function loadData_SetsFixtureFileIsInvalidException()
    {
        $this->expectException(InvalidSetException::class);
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

    public function expectExceptionMessagePart($regExp)
    {
        if(method_exists($this, 'expectExceptionMessageMatches')) {
            return $this->expectExceptionMessageMatches($regExp);
        }

        $this->expectExceptionMessageRegExp($regExp);
    }
}
