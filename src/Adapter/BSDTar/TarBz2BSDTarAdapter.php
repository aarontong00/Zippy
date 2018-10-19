<?php

namespace Aarontong00\Zippy\Adapter\BSDTar;

use Aarontong00\Zippy\Adapter\Resource\ResourceInterface;
use Aarontong00\Zippy\Exception\NotSupportedException;

class TarBz2BSDTarAdapter extends TarBSDTarAdapter
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
