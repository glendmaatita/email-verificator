<?php

namespace EmailVerificator;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use EmailVerificator\RequestInterface;

abstract class AbstractValidator
{
    protected $request;
    protected $client;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->client = $this->buildClient();
    }

    public function buildClient()
    {
        $client = new GuzzleClient([
            'base_uri' => $this->request->getBaseUri(),
            'timeout' => $this->request->getTimeout(),
        ]);

        return $client;
    }
}
