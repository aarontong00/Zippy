<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\Resource\Teleporter;

use Aarontong00\Zippy\Resource\Reader\Stream\StreamReaderFactory;
use Aarontong00\Zippy\Resource\ResourceLocator;
use Aarontong00\Zippy\Resource\Writer\StreamWriter;

/**
 * This class transport an object using php stream wrapper
 */
class StreamTeleporter extends GenericTeleporter
{
    public function __construct()
    {
        parent::__construct(new StreamReaderFactory(), new StreamWriter(), new ResourceLocator());
    }

    /**
     * Creates the StreamTeleporter
     *
     * @return StreamTeleporter
     * @deprecated This method will be removed in a future release (0.5.x)
     */
    public static function create()
    {
        return new static();
    }
}
