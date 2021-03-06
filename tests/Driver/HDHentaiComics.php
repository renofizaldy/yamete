<?php

namespace YameteTests\Driver;


class HDHentaiComics extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownload()
    {
        $url = 'https://hdhentaicomics.com/camp-woody-camp-chaos-hentai-comics/';
        $driver = new \Yamete\Driver\HDHentaiComics();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(17, count($driver->getDownloadables()));
    }
}
