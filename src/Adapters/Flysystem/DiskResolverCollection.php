<?php

namespace Mosaic\Filesystem\Adapters\Flysystem;

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
    public function add($name, callable $resolver)
    {
        $this->resolvers[$name] = $resolver;
    }

    /**
     * @return array
     */
    public function release()
    {
        $resolvers = [];
        foreach ($this->resolvers as $name => $resolver) {
            $resolvers[$name] = $resolver();
        }

        return $resolvers;
    }
}
