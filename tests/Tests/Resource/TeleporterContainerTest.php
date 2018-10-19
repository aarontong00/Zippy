<?php

namespace Aarontong00\Zippy\Tests\Resource;

use Aarontong00\Zippy\Tests\TestCase;
use Aarontong00\Zippy\Resource\TeleporterContainer;

class TeleporterContainerTest extends TestCase
{
    /**
     * @covers \Aarontong00\Zippy\Resource\TeleporterContainer::fromResource
     * @dataProvider provideResourceData
     */
    public function testFromResource($resource, $classname)
    {
        $container = TeleporterContainer::load();

        $this->assertInstanceOf($classname, $container->fromResource($resource));
    }
    /**
     * @covers \Aarontong00\Zippy\Resource\TeleporterContainer::fromResource
     * @expectedException \Aarontong00\Zippy\Exception\InvalidArgumentException
     */
    public function testFromResourceThatFails()
    {
        $container = TeleporterContainer::load();
        $container->fromResource($this->createResource(array()));
    }

    public function provideResourceData()
    {
        return array(
            array($this->createResource(__FILE__), 'Aarontong00\Zippy\Resource\Teleporter\LocalTeleporter'),
            array($this->createResource(fopen(__FILE__, 'rb')), 'Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter'),
            array($this->createResource('ftp://192.168.1.1/images/elephant.png'), 'Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter'),
            array($this->createResource('http://127.0.0.1:8080/plus-badge.png'), 'Aarontong00\Zippy\Resource\Teleporter\GenericTeleporter'),
        );
    }

    private function createResource($data)
    {
        $resource = $this->getMockBuilder('\Aarontong00\Zippy\Resource\Resource')
            ->disableOriginalConstructor()
            ->getMock();

        $resource->expects($this->any())
            ->method('getOriginal')
            ->will($this->returnValue($data));

        return $resource;
    }

    /**
     * @covers Aarontong00\Zippy\Resource\TeleporterContainer::load
     */
    public function testLoad()
    {
        $container = TeleporterContainer::load();

        $this->assertInstanceOf('Aarontong00\Zippy\Resource\TeleporterContainer', $container);

        $this->assertInstanceOf('Aarontong00\Zippy\Resource\Teleporter\GenericTeleporter', $container['guzzle-teleporter']);
        $this->assertInstanceOf('Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter', $container['stream-teleporter']);
        $this->assertInstanceOf('Aarontong00\Zippy\Resource\Teleporter\LocalTeleporter', $container['local-teleporter']);
    }
}
