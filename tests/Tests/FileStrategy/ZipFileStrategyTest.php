<?php

namespace aarontong00\Zippy\Tests\FileStrategy;

use aarontong00\Zippy\FileStrategy\ZipFileStrategy;

class ZipFileStrategyTest extends FileStrategyTestCase
{
    protected function getStrategy($container)
    {
        return new ZipFileStrategy($container);
    }
}
