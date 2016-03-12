<?php

namespace Mosaic\Filesystem\Providers;

use Interop\Container\Definition\DefinitionProviderInterface;
use League\Flysystem\Filesystem as Flystem;
use League\Flysystem\MountManager;
use Mosaic\Filesystem\Adapters\Flysystem\DiskResolverCollection;
use Mosaic\Filesystem\Adapters\Flysystem\Filesystem;
use Mosaic\Filesystem\Filesystem as FilesystemInterface;

class FlystemProvider implements DefinitionProviderInterface
{
    /**
     * @var DiskResolverCollection
     */
    private $collection;

    /**
     * @param DiskResolverCollection $collection
     */
    public function __construct(DiskResolverCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Returns the definition to register in the container.
     *
     * Definitions must be indexed by their entry ID. For example:
     *
     *     return [
     *         'logger' => ...
     *         'mailer' => ...
     *     ];
     *
     * @return array
     */
    public function getDefinitions()
    {
        return [
            FilesystemInterface::class => function () {

                $manager = new MountManager();

                foreach ($this->collection->all() as $name => $adapter) {
                    $manager->mountFilesystem($name, new Flystem(
                        $adapter()
                    ));
                }

                return new Filesystem(
                    $manager
                );
            }
        ];
    }
}
