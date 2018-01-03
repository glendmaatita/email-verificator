<?php

namespace EmailVerificator;

use GuzzleHttp\Client;

abstract class AbstractVerificator
{
    protected $baseUri;
    protected $endpoint;
    protected $body;
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

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
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function verify()
    {
        try {
            $client = new Client(['base_uri' => $this->baseUri]);
            $response = $client->request('GET', $this->endpoint, $this->body);
            return json_decode($response->getBody()->getContents(), 1);
        } catch(\Exception $e) {
            // do something here
        }
    }

    protected function getOption(&$var, $default=null) {
        return isset($var) ? $var : $default;
    }
}
