<?php

namespace Mosaic\Filesystem\Tests\Providers;

use Interop\Container\Definition\DefinitionProviderInterface;
use Mosaic\Filesystem\Adapters\Flysystem\DiskResolverCollection;
use Mosaic\Filesystem\Filesystem;
use Mosaic\Filesystem\Providers\FlystemProvider;

class FlystemProviderTest extends \PHPUnit_Framework_TestCase
{
    public function getDefinition() : DefinitionProviderInterface
    {
        return new FlystemProvider(new DiskResolverCollection());
    }

    public function shouldDefine() : array
    {
        return [
            Filesystem::class
        ];
    }

    public function test_defines_all_required_contracts()
    {
        $definitions = $this->getDefinition()->getDefinitions();
        foreach ($this->shouldDefine() as $define) {
            $this->assertArrayHasKey($define, $definitions);
        }
    }
}
