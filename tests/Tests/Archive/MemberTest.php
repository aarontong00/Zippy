<?php

namespace aarontong00\Zippy\Tests\Archive;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Archive\Member;
use aarontong00\Zippy\Archive\MemberInterface;

class MemberTest extends TestCase
{
    public function testNewInstance()
    {
        $member = new Member(
            $this->getResource('archive/located/here'),
             $this->getMockBuilder('\aarontong00\Zippy\Adapter\AdapterInterface')->getMock(),
            'location',
            1233456,
            new \DateTime("2012-07-08 11:14:15"),
            true
        );

        $this->assertTrue($member instanceof MemberInterface);

        return $member;
    }

    /**
     * @depends testNewInstance
     */
    public function testGetLocation($member)
    {
        $this->assertEquals('location', $member->getLocation());
    }

    /**
     * @depends testNewInstance
     */
    public function testIsDir($member)
    {
        $this->assertTrue($member->isDir());
    }

    /**
     * @depends testNewInstance
     */
    public function testGetLastModifiedDate($member)
    {
        $this->assertEquals(new \DateTime("2012-07-08 11:14:15"), $member->getLastModifiedDate());
    }

    /**
     * @depends testNewInstance
     */
    public function testGetSize($member)
    {
        $this->assertEquals(1233456, $member->getSize());
    }

    /**
     * @depends testNewInstance
     */
    public function testToString($member)
    {
        $this->assertEquals('location', (string) $member);
    }

    public function testExtract()
    {
        $mockAdapter =  $this->getMockBuilder('\aarontong00\Zippy\Adapter\AdapterInterface')->getMock();

        $mockAdapter
            ->expects($this->any())
            ->method('extractMembers');

        $member = new Member(
           $this->getResource('archive/located/here'),
           $mockAdapter,
           '/member/located/here',
           1233456,
           new \DateTime("2012-07-08 11:14:15"),
           true
        );

        $file = $member->extract();
        $this->assertEquals(sprintf('%s%s', getcwd(), '/member/located/here'), $file->getPathname());

        $file = $member->extract('/custom/location');
        $this->assertEquals('/custom/location/member/located/here', $file->getPathname());
    }

    public function testRelativeExtract()
    {
        $mockAdapter =  $this->getMockBuilder('\aarontong00\Zippy\Adapter\AdapterInterface')->getMock();

        $mockAdapter
            ->expects($this->any())
            ->method('extractMembers');

        $member = new Member(
           $this->getResource('archive/located/here'),
           $mockAdapter,
           'relative',
           1233456,
           new \DateTime("2012-07-08 11:14:15"),
           true
        );

        $file = $member->extract();
        $this->assertEquals(sprintf('%s%s', getcwd(), '/relative'), $file->getPathname());

        $file = $member->extract('/custom/location');
        $this->assertEquals('/custom/location/relative', $file->getPathname());
    }
}
