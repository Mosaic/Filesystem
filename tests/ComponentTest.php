<?php

namespace Mosaic\Filesystem\Tests;

use Mosaic\Common\Conventions\DefaultFolderStructure;
use Mosaic\Filesystem\Adapters\Flysystem\DiskResolverCollection;
use Mosaic\Filesystem\Component;
use Mosaic\Filesystem\Providers\FlystemProvider;

class ComponentTest extends \PHPUnit_Framework_TestCase
{
    public function test_can_ask_for_flystem_implementation()
    {
        $component = Component::flysystem(new DefaultFolderStructure('/'));

        $this->assertInstanceOf(\Mosaic\Filesystem\Adapters\Flysystem\Component::class, $component);
    }

    public function test_can_ask_for_custom_implementation()
    {
        Component::extend('custom', function ($folder) {
            return [
                new FlystemProvider(new DiskResolverCollection)
            ];
        });

        $component = Component::custom(new DefaultFolderStructure('/'));

        $this->assertEquals('custom', $component->getImplementation());
        $this->assertInstanceOf(Component::class, $component);
        $this->assertCount(1, $component->getProviders());
    }
}
