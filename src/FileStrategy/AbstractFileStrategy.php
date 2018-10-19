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

use Aarontong00\Zippy\Adapter\AdapterContainer;
use Aarontong00\Zippy\Exception\RuntimeException;

abstract class AbstractFileStrategy implements FileStrategyInterface
{
    protected $container;

    public function __construct(AdapterContainer $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdapters()
    {
        $services = array();
        foreach ($this->getServiceNames() as $serviceName) {
            try {
                $services[] = $this->container[$serviceName];
            } catch (RuntimeException $e) {

            }
        }

        return $services;
    }

    /**
     * Returns an array of service names that defines adapters.
     *
     * @return string[]
     */
    abstract protected function getServiceNames();
}
