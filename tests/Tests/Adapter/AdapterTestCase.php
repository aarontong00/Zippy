<?php

namespace Aarontong00\Zippy\Tests\Adapter;

use Aarontong00\Zippy\Tests\TestCase;

abstract class AdapterTestCase extends TestCase
{
    public function testIsSupported()
    {
        $adapter = $this->provideSupportedAdapter();
        $this->assertTrue($adapter->isSupported());
    }

    public function testIsNotSupported()
    {
        $adapter = $this->provideNotSupportedAdapter();
        $this->assertFalse($adapter->isSupported());
    }

    abstract protected function provideNotSupportedAdapter();

    abstract protected function provideSupportedAdapter();
}
