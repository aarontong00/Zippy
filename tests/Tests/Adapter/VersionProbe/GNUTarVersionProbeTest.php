<?php

namespace aarontong00\Zippy\Tests\Adapter\VersionProbe;

class GNUTarVersionProbeTest extends AbstractTarVersionProbeTest
{
    public function getProbeClassName()
    {
        return 'aarontong00\Zippy\Adapter\VersionProbe\GNUTarVersionProbe';
    }

    public function getCorrespondingVersionOutput()
    {
        return $this->getGNUTarVersionOutput();
    }

    public function getNonCorrespondingVersionOutput()
    {
        return $this->getBSDTarVersionOutput();
    }
}
