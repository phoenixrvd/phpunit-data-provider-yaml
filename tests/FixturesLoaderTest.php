<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

class FixturesLoaderTest extends TestCase
{

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\FixtureFileNotFoundException
     */
    public function loadData_SetsFileNotFoundException()
    {
        $this->loadFixture('NotExistingFile');
    }

    /**
     * @param $name
     * @throws FixtureFileIsEmptyException
     * @throws FixtureFileNotFoundException
     * @throws FixtureFileIsInvalidException
     */
    private function loadFixture($name)
    {
        return $this->Loader()->loadDataSets($name);
    }

    private function Loader()
    {
        return new FixturesLoader($this);
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\FixtureFileIsEmptyException
     */
    public function loadData_SetsFileIsEmptyException()
    {
        $this->loadFixture('emptyFixtureFile');
    }

    /**
     * @test
     * @expectedException \PhoenixRVD\PHPUnitDataProviderYAML\FixtureFileIsInvalidException
     */
    public function loadData_SetsFixtureFileIsInvalidException()
    {
        $this->loadFixture('invalidFixtureFile');
    }

    /**
     * @test
     */
    public function loadData_withValidFixtures()
    {
        $data = $this->loadFixture('validFixture');
        self::assertArrayHasKey('DataSet1', $data);
    }

}
