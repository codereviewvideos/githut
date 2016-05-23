<?php

namespace AppBundle\Service;

interface HttpClientInterface
{
    public function get($url);
    public function post($url, $data);
}