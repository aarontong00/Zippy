<?php

namespace aarontong00\Zippy\Tests\Resource;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Resource\ResourceTeleporter;

class ResourceTeleporterTest extends TestCase
{
    /**
     * @covers aarontong00\Zippy\Resource\ResourceTeleporter::__construct
     */
    public function testConstruct()
    {
        $container = $this->getMockBuilder('\aarontong00\Zippy\Resource\TeleporterContainer')
            ->disableOriginalConstructor()
            ->getMock();

        $teleporter = new ResourceTeleporter($container);

        return $teleporter;
    }

    /**
     * @covers aarontong00\Zippy\Resource\ResourceTeleporter::teleport
     */
    public function testTeleport()
    {
        $context = 'supa-context';
        $resource = $this->getMockBuilder('\aarontong00\Zippy\Resource\Resource')
            ->disableOriginalConstructor()
            ->getMock();

        $container = $this->getMockBuilder('\aarontong00\Zippy\Resource\TeleporterContainer')
            ->disableOriginalConstructor()
            ->getMock();

        $teleporter = $this->getMockBuilder('\aarontong00\Zippy\Resource\Teleporter\TeleporterInterface')->getMock();
        $teleporter->expects($this->once())
            ->method('teleport')
            ->with($this->equalTo($resource), $this->equalTo($context));

        $container->expects($this->once())
            ->method('fromResource')
            ->with($this->equalTo($resource))
            ->will($this->returnValue($teleporter));

        $resourceTeleporter = new ResourceTeleporter($container);
        $resourceTeleporter->teleport($context, $resource);
    }

    /**
     * @covers aarontong00\Zippy\Resource\ResourceTeleporter::create
     */
    public function testCreate()
    {
        $this->assertInstanceOf('aarontong00\Zippy\Resource\ResourceTeleporter', ResourceTeleporter::create());
    }
}
