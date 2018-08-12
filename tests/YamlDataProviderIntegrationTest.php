<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML;

class YamlDataProviderIntegrationTest extends TestCase
{
    use YamlDataProvider;

    /**
     * @test
     * @dataProvider yamlDataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $result
     */
    public function calcSum($a, $b, $result)
    {
        self::assertEquals($result, $a + $b);
    }
}
