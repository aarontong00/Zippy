<?php

namespace Aarontong00\Zippy\Tests\FileStrategy;

use Aarontong00\Zippy\FileStrategy\ZipFileStrategy;

class ZipFileStrategyTest extends FileStrategyTestCase
{
    protected function getStrategy($container)
    {
        return new ZipFileStrategy($container);
    }
}
