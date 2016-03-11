<?php

namespace Mosaic\Filesystem\Adapters\Flysystem;

use League\Flysystem\MountManager;
use Mosaic\Filesystem\Filesystem as FilesystemInterface;

class Filesystem implements FilesystemInterface
{
    /**
     * @var MountManager
     */
    private $manager;

    /**
     * Filesystem constructor.
     * @param MountManager $manager
     */
    public function __construct(MountManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Check whether a file exists.
     *
     * @param  string $path
     * @return bool
     */
    public function has($path)
    {
        return $this->manager->has($path);
    }

    /**
     * Read a file.
     *
     * @param  string       $path The path to the file.
     * @return string|false The file contents or false on failure.
     */
    public function read($path)
    {
        return $this->manager->read($path);
    }

    /**
     * Retrieves a read-stream for a path.
     *
     * @param  string         $path The path to the file.
     * @return resource|false The path resource or false on failure.
     */
    public function readStream($path)
    {
        return $this->manager->readStream($path);
    }

    /**
     * List contents of a directory.
     *
     * @param  string $directory The directory to list.
     * @param  bool   $recursive Whether to list recursively.
     * @return array  A list of file metadata.
     */
    public function listContents($directory = '', $recursive = false)
    {
        return $this->manager->listContents($directory, $recursive);
    }

    /**
     * Get a file's metadata.
     *
     * @param  string      $path The path to the file.
     * @return array|false The file metadata or false on failure.
     */
    public function getMetadata($path)
    {
        return $this->manager->getMetadata($path);
    }

    /**
     * Get a file's size.
     *
     * @param  string    $path The path to the file.
     * @return int|false The file size or false on failure.
     */
    public function getSize($path)
    {
        return $this->manager->getSize($path);
    }

    /**
     * Get a file's mime-type.
     *
     * @param  string       $path The path to the file.
     * @return string|false The file mime-type or false on failure.
     */
    public function getMimetype($path)
    {
        return $this->manager->getMimetype($path);
    }

    /**
     * Get a file's timestamp.
     *
     * @param  string       $path The path to the file.
     * @return string|false The timestamp or false on failure.
     */
    public function getTimestamp($path)
    {
        return $this->manager->getTimestamp($path);
    }

    /**
     * Get a file's visibility.
     *
     * @param  string       $path The path to the file.
     * @return string|false The visibility (public|private) or false on failure.
     */
    public function getVisibility($path)
    {
        return $this->manager->getVisibility($path);
    }

    /**
     * Write a new file.
     *
     * @param  string $path     The path of the new file.
     * @param  string $contents The file contents.
     * @param  array  $config   An optional configuration array.
     * @return bool   True on success, false on failure.
     */
    public function write($path, $contents, array $config = [])
    {
        return $this->manager->write($path, $contents, $config);
    }

    /**
     * Write a new file using a stream.
     *
     * @param  string   $path     The path of the new file.
     * @param  resource $resource The file handle.
     * @param  array    $config   An optional configuration array.
     * @return bool     True on success, false on failure.
     */
    public function writeStream($path, $resource, array $config = [])
    {
        return $this->manager->writeStream($path, $resource, $config);
    }

    /**
     * Update an existing file.
     *
     * @param  string $path     The path of the existing file.
     * @param  string $contents The file contents.
     * @param  array  $config   An optional configuration array.
     * @return bool   True on success, false on failure.
     */
    public function update($path, $contents, array $config = [])
    {
        return $this->manager->update($path, $config, $config);
    }

    /**
     * Update an existing file using a stream.
     *
     * @param  string   $path     The path of the existing file.
     * @param  resource $resource The file handle.
     * @param  array    $config   An optional configuration array.
     * @return bool     True on success, false on failure.
     */
    public function updateStream($path, $resource, array $config = [])
    {
        return $this->manager->updateStream($path, $resource, $config);
    }

    /**
     * Rename a file.
     *
     * @param  string $path    Path to the existing file.
     * @param  string $newpath The new path of the file.
     * @return bool   True on success, false on failure.
     */
    public function rename($path, $newpath)
    {
        return $this->manager->rename($path, $newpath);
    }

    /**
     * Copy a file.
     *
     * @param  string $path    Path to the existing file.
     * @param  string $newpath The new path of the file.
     * @return bool   True on success, false on failure.
     */
    public function copy($path, $newpath)
    {
        return $this->manager->copy($path, $newpath);
    }

    /**
     * Delete a file.
     *
     * @param  string $path
     * @return bool   True on success, false on failure.
     */
    public function delete($path)
    {
        return $this->manager->delete($path);
    }

    /**
     * Delete a directory.
     *
     * @param  string $dirname
     * @return bool   True on success, false on failure.
     */
    public function deleteDir($dirname)
    {
        return $this->manager->deleteDir($dirname);
    }

    /**
     * Create a directory.
     *
     * @param  string $dirname The name of the new directory.
     * @param  array  $config  An optional configuration array.
     * @return bool   True on success, false on failure.
     */
    public function createDir($dirname, array $config = [])
    {
        return $this->manager->createDir($dirname, $config);
    }

    /**
     * Set the visibility for a file.
     *
     * @param  string $path       The path to the file.
     * @param  string $visibility One of 'public' or 'private'.
     * @return bool   True on success, false on failure.
     */
    public function setVisibility($path, $visibility)
    {
        return $this->manager->setVisibility($path, $visibility);
    }

    /**
     * Create a file or update if exists.
     *
     * @param  string $path     The path to the file.
     * @param  string $contents The file contents.
     * @param  array  $config   An optional configuration array.
     * @return bool   True on success, false on failure.
     */
    public function put($path, $contents, array $config = [])
    {
        return $this->manager->put($path, $contents, $config);
    }

    /**
     * Create a file or update if exists.
     *
     * @param  string   $path     The path to the file.
     * @param  resource $resource The file handle.
     * @param  array    $config   An optional configuration array.
     * @return bool     True on success, false on failure.
     */
    public function putStream($path, $resource, array $config = [])
    {
        return $this->manager->putStream($path, $resource, $config);
    }

    /**
     * Read and delete a file.
     *
     * @param  string       $path The path to the file.
     * @return string|false The file contents, or false on failure.
     */
    public function readAndDelete($path)
    {
        return $this->manager->readAndDelete($path);
    }
}
