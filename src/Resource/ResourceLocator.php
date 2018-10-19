<?php

namespace aarontong00\Zippy\Resource;

use aarontong00\Zippy\Resource\Resource AS ZippyResource;

class ResourceLocator
{
    public function mapResourcePath(ZippyResource $resource, $context)
    {
        return rtrim($context, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $resource->getTarget();
    }
}
