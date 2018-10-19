<?php

namespace Aarontong00\Zippy\Resource\Reader\Guzzle;

use Aarontong00\Zippy\Resource\Resource as ZippyResource;
use Aarontong00\Zippy\Resource\ResourceReader;
use Aarontong00\Zippy\Resource\ResourceReaderFactory;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class GuzzleReaderFactory implements ResourceReaderFactory
{
    /**
     * @var ClientInterface|null
     */
    private $client = null;

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client;

        if (! $this->client) {
            $this->client = new Client();
        }
    }

    /**
     * @param ZippyResource $resource
     * @param string        $context
     *
     * @return ResourceReader
     */
    public function getReader(ZippyResource $resource, $context)
    {
        return new GuzzleReader($resource, $this->client);
    }
}
