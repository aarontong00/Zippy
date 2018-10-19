<?php

namespace Aarontong00\Zippy\Tests\FileStrategy;

use Aarontong00\Zippy\FileStrategy\TarFileStrategy;

class TarFileStrategyTest extends FileStrategyTestCase
{
    protected function getStrategy($container)
    {
        return new TarFileStrategy($container);
    }
}
