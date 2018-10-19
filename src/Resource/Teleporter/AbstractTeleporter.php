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

use aarontong00\Zippy\Exception\IOException;
use aarontong00\Zippy\Resource\Resource as ZippyResource;

/**
 * Class AbstractTeleporter
 * @package aarontong00\Zippy\Resource\Teleporter
 *
 * @deprecated Typehint against TeleporterInterface instead and use GenericTeleporter
*  with custom reader/writers instead. This class will be removed in v0.5.x
 */
abstract class AbstractTeleporter implements TeleporterInterface
{
    /**
     * Writes the target
     *
     * @param string        $data
     * @param ZippyResource $resource
     * @param string        $context
     *
     * @return TeleporterInterface
     *
     * @throws IOException
     */
    protected function writeTarget($data, ZippyResource $resource, $context)
    {
        $target = $this->getTarget($context, $resource);

        if (!file_exists(dirname($target)) && false === mkdir(dirname($target))) {
            throw new IOException(sprintf('Could not create parent directory %s', dirname($target)));
        }

        if (false === file_put_contents($target, $data)) {
            throw new IOException(sprintf('Could not write to %s', $target));
        }

        return $this;
    }

    /**
     * Returns the relative target of a Resource
     *
     * @param string        $context
     * @param ZippyResource $resource
     *
     * @return string
     */
    protected function getTarget($context, ZippyResource $resource)
    {
        return sprintf('%s/%s', rtrim($context, '/'), $resource->getTarget());
    }
}
