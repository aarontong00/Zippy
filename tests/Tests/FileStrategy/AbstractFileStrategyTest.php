<?php

namespace aarontong00\Zippy\Tests\FileStrategy;

use aarontong00\Zippy\Adapter\AdapterContainer;
use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Exception\RuntimeException;

class AbstractFileStrategyTest extends TestCase
{
    /**
     * @expectedException   \InvalidArgumentException
     */
    public function testGetAdaptersWithNoDefinedServices()
    {
        $container = AdapterContainer::load();

        $stub = $this->getMockForAbstractClass('aarontong00\Zippy\FileStrategy\AbstractFileStrategy', array($container));
        $stub->expects($this->any())
            ->method('getServiceNames')
            ->will($this->returnValue(array(
                'Unknown\Services'
            )));


        $adapters = $stub->getAdapters();
        $this->assertInternalType('array', $adapters);
        $this->assertCount(0, $adapters);
    }

    public function testGetAdapters()
    {
        $container = AdapterContainer::load();

        $stub = $this->getMockForAbstractClass('aarontong00\Zippy\FileStrategy\AbstractFileStrategy', array($container));
        $stub->expects($this->any())
            ->method('getServiceNames')
            ->will($this->returnValue(array(
                'aarontong00\\Zippy\\Adapter\\ZipAdapter',
                'aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter'
            )));

        $adapters = $stub->getAdapters();
        $this->assertInternalType('array', $adapters);
        $this->assertCount(2, $adapters);
        foreach ($adapters as $adapter) {
            $this->assertInstanceOf('aarontong00\\Zippy\\Adapter\\AdapterInterface', $adapter);
        }
    }

    public function testGetAdaptersWithAdapterThatRaiseAnException()
    {
        $adapterMock = $this->getMockBuilder('\aarontong00\Zippy\Adapter\AdapterInterface')->getMock();
        $container = $this->getMockBuilder('\aarontong00\Zippy\Adapter\AdapterContainer')->getMock();
        $container
            ->expects($this->at(0))
            ->method('offsetGet')
            ->with($this->equalTo('aarontong00\\Zippy\\Adapter\\ZipAdapter'))
            ->will($this->returnValue($adapterMock));

        $container
            ->expects($this->at(1))
            ->method('offsetGet')
            ->with($this->equalTo('aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter'))
            ->will($this->throwException(new RuntimeException()));

        $stub = $this->getMockForAbstractClass('aarontong00\Zippy\FileStrategy\AbstractFileStrategy', array($container));
        $stub->expects($this->any())
            ->method('getServiceNames')
            ->will($this->returnValue(array(
                'aarontong00\\Zippy\\Adapter\\ZipAdapter',
                'aarontong00\\Zippy\\Adapter\\ZipExtensionAdapter'
            )));

        $adapters = $stub->getAdapters();
        $this->assertInternalType('array', $adapters);
        $this->assertCount(1, $adapters);
        foreach ($adapters as $adapter) {
            $this->assertSame($adapterMock, $adapter);
        }
    }   
}
