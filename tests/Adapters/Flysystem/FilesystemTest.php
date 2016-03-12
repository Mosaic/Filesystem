<?php

namespace Mosaic\Filesystem\Tests\Adapters\Flysystem;

use League\Flysystem\MountManager;
use Mockery\Mock;
use Mosaic\Filesystem\Adapters\Flysystem\Filesystem;

class FilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Filesystem
     */
    protected $file;

    /**
     * @var Mock
     */
    protected $manager;

    public function setUp()
    {
        $this->file = new Filesystem(
            $this->manager = \Mockery::mock(MountManager::class)
        );
    }

    public function test_can_check_whether_file_exists()
    {
        $this->manager->shouldReceive('has')->with('path')->andReturn(true);

        $this->assertTrue($this->file->has('path'));
    }

    public function test_can_read_a_file()
    {
        $this->manager->shouldReceive('read')->with('path')->andReturn('file');

        $this->assertEquals('file', $this->file->read('path'));
    }

    public function test_can_retrieve_read_stream_for_path()
    {
        $this->manager->shouldReceive('readStream')->with('path')->andReturn('stream');

        $this->assertEquals('stream', $this->file->readStream('path'));
    }

    public function test_can_list_contents_of_directory()
    {
        $this->manager->shouldReceive('listContents')->with('path', false)->andReturn(['contents']);

        $this->assertEquals(['contents'], $this->file->listContents('path', false));
    }

    public function test_can_get_file_metadata()
    {
        $this->manager->shouldReceive('getMetadata')->with('path')->andReturn(['meta']);

        $this->assertEquals(['meta'], $this->file->getMetadata('path'));
    }

    public function test_can_get_filesize()
    {
        $this->manager->shouldReceive('getSize')->with('path')->andReturn('size');

        $this->assertEquals('size', $this->file->getSize('path'));
    }

    public function test_can_get_mimetype()
    {
        $this->manager->shouldReceive('getMimetype')->with('path')->andReturn('mine');

        $this->assertEquals('mine', $this->file->getMimetype('path'));
    }

    public function test_can_get_timestamp()
    {
        $this->manager->shouldReceive('getTimestamp')->with('path')->andReturn('time');

        $this->assertEquals('time', $this->file->getTimestamp('path'));
    }

    public function test_can_get_visibility()
    {
        $this->manager->shouldReceive('getVisibility')->with('path')->andReturn('public');

        $this->assertEquals('public', $this->file->getVisibility('path'));
    }

    public function test_can_write_new_file()
    {
        $this->manager->shouldReceive('write')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->write('path', 'contents'));
    }

    public function test_can_write_new_file_using_stream()
    {
        $this->manager->shouldReceive('writeStream')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->writeStream('path', 'contents'));
    }

    public function test_can_update_file()
    {
        $this->manager->shouldReceive('update')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->update('path', 'contents'));
    }

    public function test_can_update_file_using_stream()
    {
        $this->manager->shouldReceive('updateStream')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->updateStream('path', 'contents'));
    }

    public function test_can_rename_file()
    {
        $this->manager->shouldReceive('rename')->with('path', 'new')->andReturn(true);

        $this->assertEquals(true, $this->file->rename('path', 'new'));
    }

    public function test_can_copy_file()
    {
        $this->manager->shouldReceive('copy')->with('path', 'new')->andReturn(true);

        $this->assertEquals(true, $this->file->copy('path', 'new'));
    }

    public function test_can_delete_file()
    {
        $this->manager->shouldReceive('delete')->with('path')->andReturn(true);

        $this->assertEquals(true, $this->file->delete('path'));
    }

    public function test_can_delete_dir()
    {
        $this->manager->shouldReceive('deleteDir')->with('dir')->andReturn(true);

        $this->assertEquals(true, $this->file->deleteDir('dir'));
    }

    public function test_can_create_dir()
    {
        $this->manager->shouldReceive('createDir')->with('dir', [])->andReturn(true);

        $this->assertEquals(true, $this->file->createDir('dir'));
    }

    public function test_can_set_visibility()
    {
        $this->manager->shouldReceive('setVisibility')->with('path', 'public')->andReturn(true);

        $this->assertEquals(true, $this->file->setVisibility('path', 'public'));
    }

    public function test_can_create_file_or_update_if_exists()
    {
        $this->manager->shouldReceive('put')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->put('path', 'contents', []));
    }

    public function test_can_create_file_or_update_if_exists_using_stream()
    {
        $this->manager->shouldReceive('putStream')->with('path', 'contents', [])->andReturn(true);

        $this->assertEquals(true, $this->file->putStream('path', 'contents', []));
    }

    public function test_can_read_and_delete_file()
    {
        $this->manager->shouldReceive('readAndDelete')->with('path')->andReturn('string');

        $this->assertEquals('string', $this->file->readAndDelete('path'));
    }

    public function tearDown()
    {
        \Mockery::close();
    }
}
