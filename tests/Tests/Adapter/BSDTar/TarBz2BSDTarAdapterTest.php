<?php

namespace Aarontong00\Zippy\Tests\Adapter\BSDTar;

class TarBz2BSDTarAdapterTest extends BSDTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--bzip2';
    }

    protected static function getAdapterClassName()
    {
        return 'Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter';
    }
}
