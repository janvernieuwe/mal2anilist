<?php

namespace Mal2Anilist\Test;

use Mal2Anilist\Converter;
use PHPUnit\Framework\TestCase;

class Mal2AnilistTest extends TestCase
{
    /**
     * @var Converter
     */
    private $client;

    public function setUp()
    {
        $this->client = new Converter();
    }

    /**
     * @vcr testMatchingId.yaml
     */
    public function testMatchingId()
    {
        $url = $this->client->getAnilistUrl(37430);
        self::assertEquals('https://anilist.co/anime/101280', $url);
    }

    /**
     * @vcr testNonMatchingId.yaml
     */
    public function testNonMatchingId()
    {
        $url = $this->client->getAnilistUrl(99999999999);
        self::assertNull($url);
    }
}
