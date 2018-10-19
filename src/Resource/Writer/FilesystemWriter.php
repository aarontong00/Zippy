<?php

namespace Aarontong00\Zippy\Resource\Writer;

use Aarontong00\Zippy\Resource\ResourceReader;
use Aarontong00\Zippy\Resource\ResourceWriter;

class FilesystemWriter implements ResourceWriter
{
    /**
     * @param ResourceReader $reader
     * @param string $target
     */
    public function writeFromReader(ResourceReader $reader, $target)
    {
        $directory = dirname($target);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        file_put_contents($target, $reader->getContentsAsStream());
    }
}
