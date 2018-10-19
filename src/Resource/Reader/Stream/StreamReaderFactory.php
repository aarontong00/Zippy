<?php

namespace Aarontong00\Zippy\Resource\Reader\Stream;

use Aarontong00\Zippy\Resource\Resource as ZippyResource;
use Aarontong00\Zippy\Resource\ResourceReader;
use Aarontong00\Zippy\Resource\ResourceReaderFactory;

class StreamReaderFactory implements ResourceReaderFactory
{
    /**
     * @param ZippyResource $resource
     * @param string        $context
     *
     * @return ResourceReader
     */
    public function getReader(ZippyResource $resource, $context)
    {
        return new StreamReader($resource);
    }
}
