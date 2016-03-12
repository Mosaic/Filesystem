<?php

namespace Mosaic\Filesystem\Tests\Adapters\Flysystem;

use Closure;
use InvalidArgumentException;
use Mosaic\Filesystem\Adapters\Flysystem\DiskResolverCollection;

class DiskResolverCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DiskResolverCollection
     */
    protected $collection;

    public function setUp()
    {
        $this->collection = new DiskResolverCollection();
    }

    public function test_can_add_resolver()
    {
        $this->collection->add('name', function () {
        });

        $this->assertCount(1, $this->collection->all());

        $this->collection->add('name2', function () {
        });

        $this->assertCount(2, $this->collection->all());
    }

    public function test_can_get_resolver()
    {
        $this->collection->add('name', function () {
        });

        $this->assertInstanceOf(Closure::class, $this->collection->get('name'));
    }

    public function test_cannot_get_non_existing_resolver()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Disk resolver [false] does not exist.');

        $this->collection->get('false');
    }
}
