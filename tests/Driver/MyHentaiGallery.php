<?php

namespace YameteTests\Driver;


class MyHentaiGallery extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownload()
    {
        $url = 'https://myhentaigallery.com/gallery/thumbnails/1458';
        $driver = new \Yamete\Driver\MyHentaiGallery();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(53, count($driver->getDownloadables()));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownloadSpecial()
    {
        $url = 'https://myhentaigallery.com/gallery/thumbnails/14053';
        $driver = new \Yamete\Driver\MyHentaiGallery();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(21, count($driver->getDownloadables()));
    }
}
