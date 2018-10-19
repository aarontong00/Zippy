<?php

/*
 * This file is part of Zippy.
 *
 * (c) aarontong00 <info@aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace aarontong00\Zippy\Adapter\Resource;

interface ResourceInterface
{
    /**
     * Returns the actual resource used by an adapter
     *
     * @return mixed
     */
    public function getResource();
}
