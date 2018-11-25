<?php

namespace PhoenixRVD\PHPUnitDataProviderYAML\Provider;

class Php extends AbstractFileProvider
{
    protected function getDataSets($fileGlobalPath)
    {
        /* @noinspection PhpIncludeInspection */
        return include $fileGlobalPath;
    }

    protected function getFileExtension()
    {
        return 'php';
    }
}
