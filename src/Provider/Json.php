<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML\Provider;

class Json extends AbstractFileProvider
{
    protected function getDataSets($fileGlobalPath)
    {
        $content = file_get_contents($fileGlobalPath);

        return json_decode($content, true);
    }

    protected function getFileExtension()
    {
        return 'json';
    }
}
