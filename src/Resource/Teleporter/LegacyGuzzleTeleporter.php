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

use Aarontong00\Zippy\Resource\Reader\Guzzle\LegacyGuzzleReaderFactory;
use Aarontong00\Zippy\Resource\ResourceLocator;
use Aarontong00\Zippy\Resource\ResourceReaderFactory;
use Aarontong00\Zippy\Resource\Writer\FilesystemWriter;
use Guzzle\Http\Client;

/**
 * Guzzle Teleporter implementation for HTTP resources
 *
 * @deprecated Use \Aarontong00\Zippy\Resource\GenericTeleporter instead. This class will be removed in v0.5.x
 */
class LegacyGuzzleTeleporter extends GenericTeleporter
{
    /**
     * @param Client $client
     * @param ResourceReaderFactory $readerFactory
     * @param ResourceLocator $resourceLocator
     */
    public function __construct(
        Client $client = null,
        ResourceReaderFactory $readerFactory = null,
        ResourceLocator $resourceLocator = null
    ) {
        parent::__construct($readerFactory ?: new LegacyGuzzleReaderFactory($client), new FilesystemWriter(),
            $resourceLocator);
    }

    /**
     * Creates the GuzzleTeleporter
     *
     * @deprecated
     * @return LegacyGuzzleTeleporter
     */
    public static function create()
    {
        return new static();
    }
}
