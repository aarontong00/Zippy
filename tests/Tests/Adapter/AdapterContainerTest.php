<?php

namespace aarontong00\Zippy\Tests\Adapter;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Adapter\AdapterContainer;

class AdapterContainerTest extends TestCase
{
    /** @test */
    public function itShouldRegisterAdaptersOnload()
    {
        $container = AdapterContainer::load();

        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\ZipAdapter', $container['aarontong00\\Zippy\\Adapter\\ZipAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter', $container['aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\GNUTar\\TarGNUTarAdapter', $container['aarontong00\\Zippy\\Adapter\\GNUTar\\TarGNUTarAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter', $container['aarontong00\\Zippy\\Adapter\\GNUTar\\TarGzGNUTarAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter', $container['aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter', $container['aarontong00\\Zippy\\Adapter\\BSDTar\\TarGzBSDTarAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\BSDTar\\TarBSDTarAdapter', $container['aarontong00\\Zippy\\Adapter\\BSDTar\\TarBSDTarAdapter']);
        $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter', $container['aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter']);
    }
}
