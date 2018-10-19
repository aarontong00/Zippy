<?php

namespace aarontong00\Zippy\Resource;

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
