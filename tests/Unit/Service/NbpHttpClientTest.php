<?php

declare(strict_types = 1);

namespace App\Tests\Unit\Service;

use App\Service\NbpHttpClient\NbpHttpClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NbpHttpClientTest extends KernelTestCase
{
    /**
     * @var \App\Service\NbpHttpClient\NbpHttpClient $nbpHttpClient
     */
    private NbpHttpClient $nbpHttpClient;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @var NbpHttpClient $nbpHttpClient */
        $nbpHttpClient = static::getContainer()->get(NbpHttpClient::class);
        $this->nbpHttpClient = $nbpHttpClient;
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @return void
     *
     * @throws \JsonException
     */
    public function testImportDataFromNbp(): void
    {
        $urlEnd = 'tables/a/';
        $output = $this->nbpHttpClient->getExchangeRates($urlEnd);

        self::assertNotEmpty($output);
        self::assertArrayHasKey('currency', $output[0]);
        self::assertArrayHasKey('code', $output[0]);
        self::assertArrayHasKey('mid', $output[0]);
    }
}
