<?php

/*
 * This file is part of Zippy.
 *
 * (c) aarontong00 <info@aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace aarontong00\Zippy\FileStrategy;

class TB2FileStrategy extends AbstractFileStrategy
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceNames()
    {
        return array(
            'aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter',
            'aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFileExtension()
    {
        return 'tb2';
    }
}
