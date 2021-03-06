<?php

namespace aarontong00\Zippy\Resource\Reader\Guzzle;

use aarontong00\Zippy\Resource\Resource as ZippyResource;
use aarontong00\Zippy\Resource\ResourceReader;
use GuzzleHttp\ClientInterface;

class GuzzleReader implements ResourceReader
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var \aarontong00\Zippy\Resource\Resource
     */
    private $resource;

    /**
     * @param ZippyResource   $resource
     * @param ClientInterface $client
     */
    public function __construct(ZippyResource $resource, ClientInterface $client = null)
    {
        $this->resource = $resource;
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->buildRequest()->getBody()->getContents();
    }

    /**
     * @return resource
     */
    public function getContentsAsStream()
    {
        $response = $this->buildRequest()->getBody()->getContents();
        $stream = fopen('php://temp', 'r+');

        if ($response != '') {
            fwrite($stream, $response);
            fseek($stream, 0);
        }

        return $stream;
    }

    private function buildRequest()
    {
        return $this->client->request('GET', $this->resource->getOriginal());
    }
}
