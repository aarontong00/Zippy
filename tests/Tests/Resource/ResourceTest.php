<?php

namespace aarontong00\Zippy\Tests\Resource;

use aarontong00\Zippy\Resource\Resource;
use aarontong00\Zippy\Tests\TestCase;

class ResourceTest extends TestCase
{
    /**
     * @covers aarontong00\Zippy\Resource\Resource::__construct
     * @covers aarontong00\Zippy\Resource\Resource::getTarget
     * @covers aarontong00\Zippy\Resource\Resource::getOriginal
     */
    public function testGetTargetAndOriginal()
    {
        $original = 'original-style';
        $target = 'target-fishnet';

        $resource = new Resource($original, $target);

        $this->assertEquals($original, $resource->getOriginal());
        $this->assertEquals($target, $resource->getTarget());
    }

    /**
     * @covers aarontong00\Zippy\Resource\Resource::canBeProcessedInPlace
     * @dataProvider provideProcessInPlaceData
     */
    public function testCanBeProcessedInPlace($expected, $context, $original, $target)
    {
        $resource = new Resource($original, $target);
        $result = $resource->canBeProcessedInPlace($context);

        $this->assertInternalType('boolean', $result);
        $this->assertEquals($expected, $result);
    }

    public function testGetContextForProcessInSinglePlace()
    {
        $resource = new Resource(fopen(__FILE__, 'rb'), 'file1');
        $this->assertNull($resource->getContextForProcessInSinglePlace());

        $resource = new Resource('/path/to/file1', 'file1');
        $this->assertEquals('/path/to', $resource->getContextForProcessInSinglePlace());
    }

    public function provideProcessInPlaceData()
    {
        return array(
            array(true, '/path/to', '/path/to/file1', 'file1'),
            array(true, __DIR__, __FILE__, basename(__FILE__)),
            array(false, __DIR__, fopen(__FILE__, 'rb'), basename(__FILE__)),
            array(false, '/path/to', 'ftp:///path/to/file1', 'file1'),
            array(false, '/path/to', '/path/file1', 'file1'),
            array(false, '/path/to', 'file:///path/file1', 'file1'),
            array(true, '/path', '/path/to/file1', 'to/file1'),
            array(true, '/path/to', '/path/to/subdir/file2', 'subdir/file2'),
            array(true, '/path/to', 'file:///path/to/subdir/file2', 'subdir/file2'),
        );
    }
}
