<?php

namespace Aarontong00\Zippy\Adapter\BSDTar;

use Aarontong00\Zippy\Adapter\AbstractTarAdapter;
use Aarontong00\Zippy\Adapter\VersionProbe\BSDTarVersionProbe;
use Aarontong00\Zippy\Parser\ParserInterface;
use Aarontong00\Zippy\Resource\ResourceManager;
use Aarontong00\Zippy\ProcessBuilder\ProcessBuilderFactoryInterface;

/**
 * BSDTAR allows you to create and extract files from archives using BSD tar
 *
 * @see http://people.freebsd.org/~kientzle/libarchive/man/bsdtar.1.txt
 */
class TarBSDTarAdapter extends AbstractTarAdapter
{
    public function __construct(ParserInterface $parser, ResourceManager $manager, ProcessBuilderFactoryInterface $inflator, ProcessBuilderFactoryInterface $deflator)
    {
        parent::__construct($parser, $manager, $inflator, $deflator);
        $this->probe = new BSDTarVersionProbe($inflator, $deflator);
    }

    /**
     * @inheritdoc
     */
    protected function getLocalOptions()
    {
        return array();
    }

    /**
     * @inheritdoc
     */
    public static function getName()
    {
        return 'bsd-tar';
    }

    /**
     * @inheritdoc
     */
    public static function getDefaultDeflatorBinaryName()
    {
        return array('bsdtar', 'tar');
    }

    /**
     * @inheritdoc
     */
    public static function getDefaultInflatorBinaryName()
    {
        return array('bsdtar', 'tar');
    }

    /**
     * {@inheritdoc}
     */
    protected function getListMembersOptions()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtractOptions()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtractMembersOptions()
    {
        return array();
    }
}
