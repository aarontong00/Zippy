<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\ProcessBuilder;

use Aarontong00\Zippy\Exception\InvalidArgumentException;
use Symfony\Component\Process\ProcessBuilder;

interface ProcessBuilderFactoryInterface
{
    /**
     * Returns a new instance of Symfony ProcessBuilder
     *
     * @return ProcessBuilder
     *
     * @throws InvalidArgumentException
     */
    public function create();

    /**
     * Returns the binary path
     *
     * @return string
     */
    public function getBinary();

    /**
     * Sets the binary path
     *
     * @param string $binary A binary path
     *
     * @return ProcessBuilderFactoryInterface
     *
     * @throws InvalidArgumentException In case binary is not executable
     */
    public function useBinary($binary);
}
