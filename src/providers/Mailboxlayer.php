<?php

namespace EmailVerificator\Providers;

use EmailVerificator\ProviderInterface;
use EmailVerificator\AbstractVerificator;

class Mailboxlayer extends AbstractVerificator implements ProviderInterface
{
    public function check()
    {
        $baseUri = 'http://apilayer.net/api/';

        if ($this->data['secure']) {
            $baseUri = 'https://apilayer.net/api/';
        }

        $body = [
            'query' => $this->data
        ];

        return $this
            ->setBaseUri($baseUri)
            ->setEndpoint('check')
            ->setBody($body)
            ->verify();
    }
}
