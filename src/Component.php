<?php

namespace Mosaic\Filesystem;

use Mosaic\Common\Components\AbstractComponent;
use Mosaic\Common\Conventions\FolderStructureConvention;
use Mosaic\Filesystem\Adapters\Flysystem\Component as FlysystemComponent;

class Component extends AbstractComponent
{
    /**
     * @var FolderStructureConvention
     */
    private $folderStructure;

    /**
     * @param string                    $implementation
     * @param FolderStructureConvention $folderStructure
     */
    protected function __construct(string $implementation, FolderStructureConvention $folderStructure)
    {
        parent::__construct($implementation);
        $this->folderStructure = $folderStructure;
    }

    /**
     * @param  FolderStructureConvention $folderStructure
     * @return FlysystemComponent
     */
    public static function flysystem(FolderStructureConvention $folderStructure)
    {
        return new FlysystemComponent($folderStructure);
    }

    /**
     * @param  callable $callback
     * @return array
     */
    public function resolveCustom(callable $callback) : array
    {
        return $callback($this->folderStructure);
    }
}
