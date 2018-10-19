<?php

namespace Aarontong00\Zippy\Tests\Resource;

use Aarontong00\Zippy\Tests\TestCase;
use Aarontong00\Zippy\Resource\TargetLocator;

class TargetLocatorTest extends TestCase
{
    /**
     * @dataProvider provideLocationData
     */
    public function testLocate($expected, $context, $resource)
    {
        $locator = new TargetLocator();
        $this->assertEquals($expected, $locator->locate($context, $resource));
    }

    /**
     * @expectedException Aarontong00\Zippy\Exception\TargetLocatorException
     */
    public function testLocateThatShouldFail()
    {
        $locator = new TargetLocator();
        $locator->locate("some-context", array());
    }

    /**
     * @expectedException Aarontong00\Zippy\Exception\TargetLocatorException
     */
    public function testLocateThatShouldFail2()
    {
        $locator = new TargetLocator();
        $locator->locate("some-context", fopen('file://', 'rb'));
    }

    /**
     * @expectedException Aarontong00\Zippy\Exception\TargetLocatorException
     */
    public function testLocateThatShouldFail3()
    {
        $locator = new TargetLocator();
        $locator->locate(__DIR__, __DIR__ . '/input/path/to/a/../local/file-non-existent.ext');
    }

    public function provideLocationData()
    {
        $updir = dirname(__DIR__) . '/';

        return array(
            array(basename(__FILE__), __DIR__, __FILE__),
            array(basename(__FILE__), __DIR__, new \SplFileInfo(__FILE__)),
            array('input/path/to/local/file.ext', __DIR__ , __DIR__ . '/input/path/to/a/../local/file.ext'),
            array('file.ext', __DIR__ , fopen(__DIR__ . '/input/path/to/a/../local/file.ext', 'rb')),
            array(basename(__FILE__), __DIR__, 'file://' . __FILE__),
            array(basename(__FILE__), __DIR__, fopen(__FILE__, 'rb')),
            array('temporary-file.jpg', __DIR__, '/tmp/temporary-file.jpg'),
            array('temporary-file.jpg', __DIR__, '/tmp/temporary-file.jpg'),
            array(str_replace($updir, '', __FILE__), $updir, __FILE__),
            array(basename(__FILE__), $updir, fopen(__FILE__, 'rb')),
            array('plus-badge.png', $updir, 'http://127.0.0.1:8080/plus-badge.png'),
            array('plus-badge.png', $updir, fopen('http://127.0.0.1:8080/plus-badge.png', 'rb')),
            array('hedgehog.png', $updir, 'ftp://192.168.1.1/images/hedgehog.png'),
        );
    }
}
