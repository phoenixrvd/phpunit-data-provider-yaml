<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

class ExampleTest extends \PHPUnit\Framework\TestCase
{
    use DataProviders;

    /**
     * File to be used ./ExampleTestFixtures/calcSumWithYaml.fixture.yaml
     * Path-Format: ./<__CLASS__>/<__METHOD__>.fixture.<__FILE_EXTENSION__>
     *      __CLASS__ → ExampleTest
     *      __METHOD__ → calcSumWithYaml
     *      __FILE_EXTENSION__ → yaml (For Php or Json must be phpDataProvider or jsonDataProvider).
     *
     * @test
     * @dataProvider yamlDataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $result
     */
    public function calcSumWithYaml($a, $b, $result)
    {
        self::assertEquals($result, $a + $b);
    }

    /**
     * @test
     * @dataProvider jsonDataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $result
     */
    public function calcSumWithJson($a, $b, $result)
    {
        self::assertEquals($result, $a + $b);
    }

    /**
     * @test
     * @dataProvider phpDataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $result
     */
    public function calcSumWithPhp($a, $b, $result)
    {
        self::assertEquals($result, $a + $b);
    }
}
