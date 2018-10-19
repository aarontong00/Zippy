<?php

namespace aarontong00\Zippy\Resource;

interface ResourceWriter 
{
    public function writeFromReader(ResourceReader $reader, $target);
}
