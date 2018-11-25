<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML\Provider;

class Yaml extends AbstractFileProvider
{
    /**
     * @inheritdoc
     * @return array|mixed
     * @throws \Symfony\Component\Yaml\Exception\ParseException
     */
    protected function getDataSets($fileGlobalPath)
    {
        $content = file_get_contents($fileGlobalPath);
        return \Symfony\Component\Yaml\Yaml::parse($content);
    }

    protected function getFileExtension()
    {
        return 'yaml';
    }
}