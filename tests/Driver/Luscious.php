<?php

namespace YameteTests\Driver;


class Luscious extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownload()
    {
        $url = 'https://luscious.net/albums/kawaii-wa-seigi-cute-is-justice_305595/';
        $driver = new \Yamete\Driver\Luscious();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(5, count($driver->getDownloadables()));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownloadPages()
    {
        $url = 'https://luscious.net/albums/please-help-yourself-master-2_101657/';
        $driver = new \Yamete\Driver\Luscious();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(185, count($driver->getDownloadables()));
    }
}
