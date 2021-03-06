<?php

namespace Yamete\Driver;

class Porncomix extends \Yamete\DriverAbstract
{
    private $aMatches = [];
    const DOMAIN = 'porncomix.info';

    public function canHandle(): bool
    {
        return (bool)preg_match(
            '~^http://www\.' . strtr(self::DOMAIN, ['.' => '\.']) . '/(?<album>[^/]+)/$~',
            $this->sUrl,
            $this->aMatches
        );
    }

    /**
     * @return array|string[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDownloadables(): array
    {
        $oRes = $this->getClient()->request('GET', $this->sUrl);
        $aReturn = [];
        foreach ($this->getDomParser()->load((string)$oRes->getBody())->find('.gallery dt a') as $oLink) {
            /**
             * @var \PHPHtmlParser\Dom\AbstractNode $oLink
             * @var \PHPHtmlParser\Dom\AbstractNode $oImg
             */
            $oImg = $this->getDomParser()
                ->load((string)$this->getClient()->request('GET', $oLink->getAttribute('href'))->getBody())
                ->find('.single-post .attachment-image img');
            $sFilename = $oImg->getAttribute('src');
            $aReturn[$this->getFolder() . DIRECTORY_SEPARATOR . basename($sFilename)] = $sFilename;
        }
        return $aReturn;
    }

    private function getFolder(): string
    {
        return implode(DIRECTORY_SEPARATOR, [self::DOMAIN, $this->aMatches['album']]);
    }
}
