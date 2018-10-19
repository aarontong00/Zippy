<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\Resource\Teleporter;

use Aarontong00\Zippy\Resource\Reader\Guzzle\GuzzleReaderFactory;
use Aarontong00\Zippy\Resource\ResourceLocator;
use Aarontong00\Zippy\Resource\ResourceReaderFactory;
use Aarontong00\Zippy\Resource\Writer\FilesystemWriter;

/**
 * Guzzle Teleporter implementation for HTTP resources
 *
 * @deprecated Use \Aarontong00\Zippy\Resource\GenericTeleporter instead. This class will be removed in v0.5.x
 */
class GuzzleTeleporter extends GenericTeleporter
{
    /**
     * @param ResourceReaderFactory $readerFactory
     * @param ResourceLocator $resourceLocator
     */
    public function __construct(ResourceReaderFactory $readerFactory = null, ResourceLocator $resourceLocator = null)
    {
        parent::__construct($readerFactory ?: new GuzzleReaderFactory(), new FilesystemWriter(), $resourceLocator);
    }

    /**
     * Creates the GuzzleTeleporter
     *
     * @deprecated This method will be removed in v0.5.x
     * @return GuzzleTeleporter
     */
    public static function create()
    {
        return new static();
    }
}
