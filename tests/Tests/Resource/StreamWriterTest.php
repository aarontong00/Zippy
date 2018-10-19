<?php

namespace Aarontong00\Zippy\Tests\Resource;

use Aarontong00\Zippy\Resource\Reader\Stream\StreamReader;
use Aarontong00\Zippy\Resource\Resource;
use Aarontong00\Zippy\Resource\Writer\StreamWriter;
use Aarontong00\Zippy\Tests\TestCase;

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
