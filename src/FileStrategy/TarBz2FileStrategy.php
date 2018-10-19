<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\FileStrategy;

class TarBz2FileStrategy extends AbstractFileStrategy
{
    /**
     * {@inheritdoc}
     */
    protected function getServiceNames()
    {
        return array(
            'Aarontong00\\Zippy\\Adapter\\GNUTar\\TarBz2GNUTarAdapter',
            'Aarontong00\\Zippy\\Adapter\\BSDTar\\TarBz2BSDTarAdapter'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFileExtension()
    {
        return 'tar.bz2';
    }
}
