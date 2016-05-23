<?php

namespace AppBundle\Service;

use Buzz\Message\Request;
use Buzz\Message\Response;

class BuzzHttpClient implements HttpClientInterface
{
    private $client;

    public function __construct()
    {
        $this->client = new \Buzz\Client\Curl();
        $this->client->setOption(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');
    }

    public function get($url)
    {
        $request = new Request('GET', $url);
        $response = new Response();

        $this->client->send($request, $response);

        return json_decode($response->getContent(), true);
    }

    public function post($url, $data)
    {
        // TODO: Implement post() method.
    }
}