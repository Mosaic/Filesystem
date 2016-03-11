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
     * @param FolderStructureConvention $folderStructure
     */
    public function __construct(FolderStructureConvention $folderStructure)
    {
        $this->folderStructure = $folderStructure;
    }

    /**
     * @param  FolderStructureConvention $folderStructure
     * @return FlystemComponent
     */
    public static function flystem(FolderStructureConvention $folderStructure)
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
