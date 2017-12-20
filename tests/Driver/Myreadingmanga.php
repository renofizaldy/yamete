<?php

namespace YameteTests\Driver;


class Myreadingmanga extends \PHPUnit\Framework\TestCase
{
    public function testDownload()
    {
        $url = 'https://myreadingmanga.info/p-sakai-ringo-house-sitting-eng/';
        $driver = new \Yamete\Driver\Myreadingmanga();
        $driver->setUrl($url);
        $this->assertNotFalse($driver->canHandle());
        $this->assertEquals(30, count($driver->getDownloadables()));
    }
}