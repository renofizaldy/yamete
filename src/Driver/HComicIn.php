<?php

namespace Yamete\Driver;

if (!class_exists(HComicIn::class)) {
    class HComicIn extends \Yamete\DriverAbstract
    {
        private $aMatches = [];
        const DOMAIN = 'hcomic.in';

        public function canHandle(): bool
        {
            return (bool)preg_match(
                '~^https?://(' . strtr($this->getDomain(), ['.' => '\.']) . ')/(?<lang>[a-z]{2})/s/(?<album>[0-9]+)/~',
                $this->sUrl,
                $this->aMatches
            );
        }

        protected function getDomain(): string
        {
            return self::DOMAIN;
        }

        /**
         * @return array|string[]
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function getDownloadables(): array
        {
            $oRes = $this->getClient()->request('GET', $this->sUrl);
            $aReturn = [];
            $index = 0;
            foreach ($this->getDomParser()->load((string)$oRes->getBody())->find('ul.img_list img') as $oImg) {
                /**
                 * @var \PHPHtmlParser\Dom\AbstractNode $oLink
                 * @var \PHPHtmlParser\Dom\AbstractNode $oImg
                 */
                $sFilename = str_replace('pic.', 'img.', $oImg->getAttribute('src'));
                $sBasename = $this->getFolder() . DIRECTORY_SEPARATOR . str_pad($index++, 5, '0', STR_PAD_LEFT)
                    . '-' . basename($sFilename);
                $aReturn[$sBasename] = $sFilename;
            }
            return $aReturn;
        }

        private function getFolder(): string
        {
            return implode(DIRECTORY_SEPARATOR, [$this->getDomain(), $this->aMatches['album']]);
        }
    }
}
