<?php

namespace Aarontong00\Zippy\Tests\Adapter\GNUTar;

class TarBz2GNUTarAdapterTest extends GNUTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--bzip2';
    }

    protected static function getAdapterClassName()
    {
        return 'Aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter';
    }
}
