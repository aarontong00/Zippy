<?php

namespace aarontong00\Zippy\Tests\Resource;

use aarontong00\Zippy\Resource\Reader\Stream\StreamReader;
use aarontong00\Zippy\Resource\Resource;
use aarontong00\Zippy\Resource\Writer\StreamWriter;
use aarontong00\Zippy\Tests\TestCase;

class StreamWriterTest extends TestCase
{
    public function testWriteFromReader()
    {
        $resource = new Resource(fopen(__FILE__, 'r'), fopen(__FILE__, 'r'));
        $reader = new StreamReader($resource);

        $streamWriter = new StreamWriter();

        $streamWriter->writeFromReader($reader, sys_get_temp_dir().'/stream/writer/test.php');
        $streamWriter->writeFromReader($reader, sys_get_temp_dir().'/test.php');
    }
}
