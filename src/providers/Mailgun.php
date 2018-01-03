<?php

namespace EmailVerificator\Providers;

use EmailVerificator\ProviderInterface;
use EmailVerificator\AbstractVerificator;

class Mailgun extends AbstractVerificator implements ProviderInterface
{
    public function check()
    {
        // process data
        $endpoint = 'address/validate';
        if ($this->data['private']) {
            $endpoint = 'address/private/validate';
        }

        $body = [
            'auth' => ['api', $this->data['api_key']],
            'query' => [
                'address' => $this->data['address'],
                'mailbox_verification' => $this->getOption($this->data['mailbox_verification'], 'false')
            ]
        ];

        return $this
            ->setBaseUri('https://api.mailgun.net/v3/')
            ->setEndpoint($endpoint)
            ->setBody($body)
            ->verify();
    }
}
