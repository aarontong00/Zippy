<?php

/*
 * This file is part of Zippy.
 *
 * (c) aarontong00 <info@aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace aarontong00\Zippy\Exception;

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
