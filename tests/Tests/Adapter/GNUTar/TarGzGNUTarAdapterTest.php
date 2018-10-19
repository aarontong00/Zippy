<?php

namespace aarontong00\Zippy\Tests\Adapter\GNUTar;

class TarGzGNUTarAdapterTest extends GNUTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--gzip';
    }

    protected static function getAdapterClassName()
    {
        return 'aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter';
    }
}
