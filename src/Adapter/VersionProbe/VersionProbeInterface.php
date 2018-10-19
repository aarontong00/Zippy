<?php

/*
 * This file is part of Zippy.
 *
 * (c) aarontong00 <info@aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace aarontong00\Zippy\Adapter\VersionProbe;

interface VersionProbeInterface
{
    const PROBE_OK = 0;
    const PROBE_NOTSUPPORTED = 1;

    /**
     * Probes for the support of an adapter.
     *
     * @return integer One of the self::PROBE_* constants
     */
    public function getStatus();
}
