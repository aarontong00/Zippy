<?php

namespace aarontong00\Zippy\Tests\Adapter\VersionProbe;

use aarontong00\Zippy\Tests\TestCase;
use aarontong00\Zippy\Adapter\VersionProbe\ZipExtensionVersionProbe;
use aarontong00\Zippy\Adapter\VersionProbe\VersionProbeInterface;

class ZipExtensionVersionProbeTest extends TestCase
{
    /**
     * @covers aarontong00\Zippy\Adapter\VersionProbe\ZipExtensionVersionProbe::getStatus
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
