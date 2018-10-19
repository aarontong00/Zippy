<?php

namespace Aarontong00\Zippy\Tests\FileStrategy;

use Aarontong00\Zippy\Adapter\AdapterInterface;
use Aarontong00\Zippy\Exception\RuntimeException;
use Aarontong00\Zippy\Tests\TestCase;
use Aarontong00\Zippy\FileStrategy\FileStrategyInterface;

abstract class FileStrategyTestCase extends TestCase
{
    /** @test */
    public function getFileExtensionShouldReturnAnString()
    {
        $that = $this;
        $container = $this->getMockBuilder('\Aarontong00\Zippy\Adapter\AdapterContainer')->getMock();
        $container
                ->expects($this->any())
                ->method('offsetGet')
                ->will($this->returnCallback(function ($offset) use ($that) {
                    if (array_key_exists('Aarontong00\Zippy\Adapter\AdapterInterface', class_implements($offset))) {
                        return $that->getMock('Aarontong00\Zippy\Adapter\AdapterInterface');
                    }

                    return null;
                }));

        $extension = $this->getStrategy($container)->getFileExtension();

        $this->assertNotEquals('', trim($extension));
        $this->assertInternalType('string', $extension);
    }

    /** @test */
    public function getAdaptersShouldReturnAnArrayOfAdapter()
    {
        $that = $this;
        $container = $this->getMockBuilder('\Aarontong00\Zippy\Adapter\AdapterContainer')->getMock();
        $container
                ->expects($this->any())
                ->method('offsetGet')
                ->will($this->returnCallback(function ($offset) use ($that) {
                    if (array_key_exists('Aarontong00\Zippy\Adapter\AdapterInterface', class_implements($offset))) {
                        return $that->getMockBuilder('\Aarontong00\Zippy\Adapter\AdapterInterface')->getMock();
                    }

                    return null;
                }));

        $adapters = $this->getStrategy($container)->getAdapters();

        $this->assertInternalType('array', $adapters);

        foreach ($adapters as $adapter) {
            $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\AdapterInterface', $adapter);
        }
    }

    /** @test */
    public function getAdaptersShouldReturnAnArrayOfAdapterEvenIfAdapterRaiseAnException()
    {
        $container = $this->getMockBuilder('\Aarontong00\Zippy\Adapter\AdapterContainer')->getMock();
        $container
            ->expects($this->any())
            ->method('offsetGet')
            ->will($this->throwException(new RuntimeException()));

        $adapters = $this->getStrategy($container)->getAdapters();

        $this->assertInternalType('array', $adapters);

        foreach ($adapters as $adapter) {
            $this->assertInstanceOf('Aarontong00\\Zippy\\Adapter\\AdapterInterface', $adapter);
        }
    }

    /**
     * @return FileStrategyInterface
     */
    abstract protected function getStrategy($container);
}
