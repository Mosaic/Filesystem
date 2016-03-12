<?php

namespace Mosaic\Filesystem\Adapters\Flysystem;

use InvalidArgumentException;

class DiskResolverCollection
{
    /**
     * @var array
     */
    private $resolvers = [];

    /**
     * @param          $name
     * @param callable $resolver
     */
    public function add(string $name, callable $resolver)
    {
        $this->resolvers[$name] = $resolver;
    }

    /**
     * @param  string   $name
     * @return callable
     */
    public function get(string $name) : callable
    {
        if (!isset($this->resolvers[$name])) {
            throw new InvalidArgumentException('Disk resolver [' . $name . '] does not exist.');
        }

        return $this->resolvers[$name];
    }

    /**
     * @return array
     */
    public function all() : array
    {
        return $this->resolvers;
    }
}
