<?php

namespace YameteTests\Driver;


class HentaiPornPicsNet extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDownload()
    {
        $url = 'http://www.hentaipornpics.net/galleries/-comic1-6-n2jirai-nimu-tsukihi-chan-ni-wa-naisho-de-keeping-secrets-from-tsukihi-chan-nisemonogatari-sharpie-translations?code=MTczeDM1eDQ3MDI=#&gid=1&pid=1';
        $driver = new \Yamete\Driver\HentaiPornPicsNet();
        $driver->setUrl($url);
        $this->assertTrue($driver->canHandle());
        $this->assertEquals(7, count($driver->getDownloadables()));
    }
}
