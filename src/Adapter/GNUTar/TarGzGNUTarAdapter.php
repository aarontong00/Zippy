<?php

namespace aarontong00\Zippy\Adapter\GNUTar;

use aarontong00\Zippy\Adapter\Resource\ResourceInterface;
use aarontong00\Zippy\Exception\NotSupportedException;

class TarGzGNUTarAdapter extends TarGNUTarAdapter
{
    /**
     * @inheritdoc
     */
    protected function doAdd(ResourceInterface $resource, $files, $recursive)
    {
        throw new NotSupportedException('Updating a compressed tar archive is not supported.');
    }

    /**
     * @inheritdoc
     */
    protected function getLocalOptions()
    {
        return array('--gzip');
    }
}
