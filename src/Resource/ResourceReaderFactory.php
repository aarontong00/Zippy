<?php

namespace Aarontong00\Zippy\Resource;

use Aarontong00\Zippy\Resource\Resource as ZippyResource;

interface ResourceReaderFactory
{
    /**
     * @param ZippyResource $resource
     * @param string        $context
     *
     * @return ResourceReader
     */
    public function getReader(ZippyResource $resource, $context);
}
