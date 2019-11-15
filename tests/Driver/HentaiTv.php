<?php

namespace YameteTests\Driver;


class HentaiTv extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownload()
    {
        $url = 'https://hentai.tv/manga/19023/';
        $driver = new \Yamete\Driver\HentaiTv();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(25, count($driver->getDownloadables()));
    }
}
