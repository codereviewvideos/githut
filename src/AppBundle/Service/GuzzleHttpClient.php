<?php

namespace AppBundle\Service;

class GuzzleHttpClient implements HttpClientInterface
{
    private $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    public function get($url)
    {
        $response = $this->client->get($url);

        return json_decode($response->getBody(), true);
    }

    public function post($url, $data)
    {
        // TODO: Implement post() method.
    }
}