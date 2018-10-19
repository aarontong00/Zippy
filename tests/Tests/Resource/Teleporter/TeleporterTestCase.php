<?php

namespace Aarontong00\Zippy\Tests\Resource\Teleporter;

use Aarontong00\Zippy\Tests\TestCase;

class TeleporterTestCase extends TestCase
{
    public function provideContexts()
    {
        if (!is_dir(__DIR__ . '/context-test')) {
            mkdir (__DIR__ . '/context-test');
        }

        return array(
            array(__DIR__),
            array(__DIR__ . '/context-test')
        );
    }
}
