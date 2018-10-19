<?php

namespace Aarontong00\Zippy\Tests\Adapter\VersionProbe;

use Aarontong00\Zippy\Tests\TestCase;
use Aarontong00\Zippy\Adapter\VersionProbe\ZipExtensionVersionProbe;
use Aarontong00\Zippy\Adapter\VersionProbe\VersionProbeInterface;

class ZipExtensionVersionProbeTest extends TestCase
{
    /**
     * @covers Aarontong00\Zippy\Adapter\VersionProbe\ZipExtensionVersionProbe::getStatus
     */
    public function testGetStatus()
    {
        $expectation = VersionProbeInterface::PROBE_OK;
        if (false === class_exists('ZipArchive')) {
            $expectation = VersionProbeInterface::PROBE_NOTSUPPORTED;
        }

        $probe = new ZipExtensionVersionProbe();
        $this->assertEquals($expectation, $probe->getStatus());
    }
}
