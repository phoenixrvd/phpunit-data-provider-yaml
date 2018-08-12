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
    public function calcSum(int $a, int $b, int $result): void
    {
        self::assertEquals($result, $a + $b);
    }
}
