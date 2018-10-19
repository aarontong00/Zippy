<?php

namespace aarontong00\Zippy\Tests\Adapter\VersionProbe;

class BSDTarVersionProbeTest extends AbstractTarVersionProbeTest
{
    public function getProbeClassName()
    {
        return 'aarontong00\Zippy\Adapter\VersionProbe\BSDTarVersionProbe';
    }

    public function getCorrespondingVersionOutput()
    {
        return $this->getBSDTarVersionOutput();
    }

    public function getNonCorrespondingVersionOutput()
    {
        return $this->getGNUTarVersionOutput();
    }
}
