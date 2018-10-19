<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\Resource;

abstract class PathUtil
{
    public static function basename($path)
    {
        return (false === $pos = strrpos(strtr($path, '\\', '/'), '/')) ? $path : substr($path, $pos + 1);
    }
}