<?php

namespace aarontong00\Zippy\Tests\Adapter\BSDTar;

class TarGzBSDTarAdapterTest extends BSDTarAdapterWithOptionsTest
{
    protected function getOptions()
    {
        return '--gzip';
    }

    protected static function getAdapterClassName()
    {
        return 'aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter';
    }
}
