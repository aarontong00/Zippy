<?php

namespace Aarontong00\Zippy\Tests\Adapter;

use Aarontong00\Zippy\Tests\TestCase;
use Aarontong00\Zippy\Adapter\AdapterContainer;

class AdapterContainerTest extends TestCase
{
    /** @test */
    public function itShouldRegisterAdaptersOnload()
    {
        $container = AdapterContainer::load();

        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\ZipAdapter', $container['Aarontong00\\Zippy\\Adapter\\ZipAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter', $container['Aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\GNUTar\\TarGNUTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\GNUTar\\TarGNUTarAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBSDTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBSDTarAdapter']);
        $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter', $container['Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter']);
    }
}
