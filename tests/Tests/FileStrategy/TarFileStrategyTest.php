<?php

namespace aarontong00\Zippy\Tests\FileStrategy;

use aarontong00\Zippy\FileStrategy\TarFileStrategy;

class TarFileStrategyTest extends FileStrategyTestCase
{
    protected function getStrategy($container)
    {
        return new TarFileStrategy($container);
    }
}
