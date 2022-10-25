<?php

declare(strict_types = 1);

namespace App\Service\NbpHttpClient;

use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NbpHttpClient
{
    /**
     * @var \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    private HttpClientInterface $client;

    /**
     * @param \Symfony\Contracts\HttpClient\HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getExchangeRates(string $urlEndDefiningData): array
    {
        $url = NbpApiConfig::NBP_API_BASE_URL . NbpApiConfig::NBP_API_EXCHANGERATES . '/' . $urlEndDefiningData;

        $response = $this->client->request('GET', $url);
        if (200 !== $response->getStatusCode()) {
            throw new Exception('Something went very wrong, your status code is not the best');
        }

        $responseData = $response->toArray();
        if (!is_array($responseData)) {
            throw new Exception('response array is empty');
        }

        if (!array_key_exists('rates', $responseData[0])) {
            throw new Exception('the key \'rates\' does not exist');
        }

        return $responseData[0]['rates'];
    }
}
