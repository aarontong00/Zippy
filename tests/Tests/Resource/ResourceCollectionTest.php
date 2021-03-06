<?php

namespace aarontong00\Zippy\Tests\Resource;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Resource\ResourceCollection;

class ResourceCollectionTest extends TestCase
{
    /**
     * @covers aarontong00\Zippy\Resource\ResourceCollection::__construct
     */
    public function testConstructWithoutElements()
    {
        $collection = new ResourceCollection('supa-context', array(), false);
        $this->assertEquals('supa-context', $collection->getContext());
        $this->assertEquals(array(), $collection->toArray());
    }

    /**
     * @covers aarontong00\Zippy\Resource\ResourceCollection::__construct
     */
    public function testConstructWithElements()
    {
        $data = array($this->createResourceMock(), 'two' => $this->createResourceMock());
        $collection = new ResourceCollection('supa-context', $data, false);
        $this->assertEquals('supa-context', $collection->getContext());
        $this->assertEquals($data, $collection->toArray());
    }

    private function createResourceMock()
    {
        return $this->getMockBuilder('\aarontong00\Zippy\Resource\Resource')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @covers aarontong00\Zippy\Resource\ResourceCollection::canBeProcessedInPlace
     * @dataProvider provideVariousInPlaceResources
     */
    public function testCanBeProcessedInPlace($expected, $first, $second, $third)
    {
        $collection = new ResourceCollection('supa-context', array(
            $this->getInPlaceResource($first),
            $this->getInPlaceResource($second),
            $this->getInPlaceResource($third),
        ), false);

        $this->assertInternalType('boolean', $collection->canBeProcessedInPlace());
        $this->assertEquals($expected, $collection->canBeProcessedInPlace());
    }

    public function provideVariousInPlaceResources()
    {
        return array(
            array(true, true, true, true),
            array(false, true, true, false),
            array(false, false, false, false),
            array(false, false, false, true),
        );
    }

    private function getInPlaceResource($processInPlace)
    {
        $resource = $this->getMockBuilder('\aarontong00\Zippy\Resource\Resource')
            ->disableOriginalConstructor()
            ->getMock();

        $resource->expects($this->any())
            ->method('canBeProcessedInPlace')
            ->will($this->returnValue($processInPlace));

        return $resource;
    }
}
