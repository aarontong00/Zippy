<?php

namespace Aarontong00\Zippy\Tests\Resource\Teleporter;

use Aarontong00\Zippy\Resource\Teleporter\GuzzleTeleporter;
use Aarontong00\Zippy\Resource\Resource;

class GuzzleTeleporterTest extends TeleporterTestCase
{
    /**
     * @covers Aarontong00\Zippy\Resource\Teleporter\GuzzleTeleporter::teleport
     * @dataProvider provideContexts
     */
    public function testTeleport($context)
    {
        $teleporter = GuzzleTeleporter::create();

        $target = 'plop-badge.png';
        $resource = new Resource('http://127.0.0.1:8080/plus-badge.png', $target);

        if (is_file($context . '/' . $target)) {
            unlink($context . '/' . $target);
        }

        $teleporter->teleport($resource, $context);

        $this->assertFileExists($context . '/' . $target);
        unlink($context . '/' . $target);
    }

    /**
     * @covers Aarontong00\Zippy\Resource\Teleporter\GuzzleTeleporter::create
     */
    public function testCreate()
    {
        $this->assertInstanceOf('Aarontong00\Zippy\Resource\Teleporter\GuzzleTeleporter', GuzzleTeleporter::create());
    }
}
