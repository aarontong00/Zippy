<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\Exception;

class TargetLocatorException extends RuntimeException
{
    private $resource;

    public function __construct($resource, $message, $code = 0, $previous = null)
    {
        $this->resource = $resource;
        parent::__construct($message, $code, $previous);
    }

    public function getResource()
    {
        return $this->resource;
    }
}
