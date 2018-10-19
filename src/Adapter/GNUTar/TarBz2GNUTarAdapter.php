<?php

namespace Aarontong00\Zippy\Adapter\GNUTar;

use Aarontong00\Zippy\Adapter\Resource\ResourceInterface;
use Aarontong00\Zippy\Exception\NotSupportedException;

class TarBz2GNUTarAdapter extends TarGNUTarAdapter
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
        return array('--bzip2');
    }
}
