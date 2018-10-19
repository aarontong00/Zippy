<?php

/*
 * This file is part of Zippy.
 *
 * (c) aarontong00 <info@aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace aarontong00\Zippy\Resource\Teleporter;

use aarontong00\Zippy\Exception\InvalidArgumentException;
use aarontong00\Zippy\Exception\IOException;
use aarontong00\Zippy\Resource\Resource as ZippyResource;

interface TeleporterInterface
{
    /**
     * Teleports a file from a destination to an other
     *
     * @param ZippyResource $resource A Resource
     * @param string        $context  The current context
     *
     * @throws IOException when file could not be written on local
     * @throws InvalidArgumentException when path to file is not valid
     */
    public function teleport(ZippyResource $resource, $context);
}
