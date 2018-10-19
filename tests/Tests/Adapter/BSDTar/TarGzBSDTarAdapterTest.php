<?php

namespace Aarontong00\Zippy\Tests\Adapter\BSDTar;

class TarGzBSDTarAdapterTest extends BSDTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--gzip';
    }

    protected static function getAdapterClassName()
    {
        return 'Aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter';
    }
}
