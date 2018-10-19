<?php

namespace aarontong00\Zippy\Tests\Adapter\Resource;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Adapter\Resource\FileResource;

class FileResourceTest extends TestCase
{
    public function testGetResource()
    {
        $path = '/path/to/resource';
        $resource = new FileResource($path);

        $this->assertEquals($path, $resource->getResource());
    }
}
