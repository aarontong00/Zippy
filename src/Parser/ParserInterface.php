<?php

/*
 * This file is part of Zippy.
 *
 * (c) Aarontong00 <info@Aarontong00.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aarontong00\Zippy\Parser;

use Aarontong00\Zippy\Exception\RuntimeException;

interface ParserInterface
{
    /**
     * Parses a file listing
     *
     * @param string $output The string to parse
     *
     * @return array An array of Member properties (location, mtime, size & is_dir)
     *
     * @throws RuntimeException In case the parsing process failed
     */
    public function parseFileListing($output);

    /**
     * Parses the inflator binary version
     *
     * @param string $output
     *
     * @return string The version
     */
    public function parseInflatorVersion($output);

    /**
     * Parses the deflator binary version
     *
     * @param string $output
     *
     * @return string The version
     */
    public function parseDeflatorVersion($output);
}
