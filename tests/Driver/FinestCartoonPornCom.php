<?php

namespace YameteTests\Driver;


class FinestCartoonPornCom extends \PHPUnit\Framework\TestCase
{
    public function testDownload()
    {
        $url = 'http://www.hentaimanga.pro/galleries/metalforever-preggo-maya-occult-academy';
        $driver = new \Yamete\Driver\FinestCartoonPornCom();
        $driver->setUrl($url);
        $this->assertNotFalse($driver->canHandle());
        $this->assertEquals(11, count($driver->getDownloadables()));
    }
}