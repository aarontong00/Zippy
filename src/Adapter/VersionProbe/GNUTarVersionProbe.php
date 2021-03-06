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

class GNUTarVersionProbe extends AbstractTarVersionProbe
{
    /**
     * {@inheritdoc}
     */
    protected function getVersionSignature()
    {
        return '(gnu tar)';
    }
}
