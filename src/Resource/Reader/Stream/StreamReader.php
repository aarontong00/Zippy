<?php

namespace aarontong00\Zippy\Resource\Reader\Stream;

use aarontong00\Zippy\Resource\Resource as ZippyResource;
use aarontong00\Zippy\Resource\ResourceReader;

class StreamReader implements ResourceReader
{
    /**
     * @var ZippyResource
     */
    private $resource;

    /**
     * @param ZippyResource $resource
     */
    public function __construct(ZippyResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return file_get_contents($this->resource->getOriginal());
    }

    /**
     * @return resource
     */
    public function getContentsAsStream()
    {
        $stream = is_resource($this->resource->getOriginal()) ?
            $this->resource->getOriginal() : @fopen($this->resource->getOriginal(), 'rb');

        return $stream;
    }
}
