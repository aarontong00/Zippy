<?php

namespace Aarontong00\Zippy\Tests\Resource\Teleporter;

use Aarontong00\Zippy\Resource\Resource;
use Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter;

class StreamTeleporterTest extends TeleporterTestCase
{
    /**
     * @covers Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter::teleport
     * @dataProvider provideContexts
     */
    public function testTeleport($context)
    {
        $teleporter = StreamTeleporter::create();

        $target = 'plop-badge.php';
        $resource = new Resource(fopen(__FILE__, 'rb'), $target);

        if (is_file($context . '/' . $target)) {
            unlink($context . '/' . $target);
        }

        $teleporter->teleport($resource, $context);

        $this->assertFileExists($context . '/' . $target);
        unlink($context . '/' . $target);
    }

    /**
     * @covers Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter::teleport
     * @dataProvider provideContexts
     */
    public function testTeleportInNonStreamMode($context)
    {
        $teleporter = StreamTeleporter::create();

        $target = 'plop-badge.php';
        $resource = new Resource(__FILE__, $target);

        if (is_file($context . '/' . $target)) {
            unlink($context . '/' . $target);
        }

        $teleporter->teleport($resource, $context);

        $this->assertFileExists($context . '/' . $target);
        unlink($context . '/' . $target);
    }

    /**
     * @covers Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter::create
     */
    public function testCreate()
    {
        $this->assertInstanceOf('Aarontong00\Zippy\Resource\Teleporter\StreamTeleporter', StreamTeleporter::create());
    }
}
