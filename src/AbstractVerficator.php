<?php

namespace EmailVerificator;

use GuzzleHttp\Client;

abstract class AbstractVerificator
{
    protected $baseUri;
    protected $endpoint;
    protected $data;

    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
        return $this;
    }
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function check()
    {
        $client = new Client(['base_uri' => $this->baseUri]);
        $response = $client->request('GET', $this->endpoint, [
            'query' => $this->data
        ]);
        return $response;
    }
}
