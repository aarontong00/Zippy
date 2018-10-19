<?php

namespace Aarontong00\Zippy\Tests\Adapter\GNUTar;

class TarGzGNUTarAdapterTest extends GNUTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--gzip';
    }

    protected static function getAdapterClassName()
    {
        return 'Aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter';
    }
}
