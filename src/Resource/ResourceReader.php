<?php

namespace Aarontong00\Zippy\Resource;

interface ResourceReader 
{
    /**
     * @return string
     */
    public function getContents();

    /**
     * @return resource
     */
    public function getContentsAsStream();
}
