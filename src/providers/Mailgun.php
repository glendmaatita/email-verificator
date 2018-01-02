<?php

namespace EmailVerificator\Providers;

use EmailVerificator\ProviderInterface;

class Mailgun implements ProviderInterface
{
    public function check($data)
    {
        // process data
        $endpoint = '/address/validate';
        if ($data['private']) {
            $endpoint = '/address/private/validate';
        }

        return $this
            ->setBaseUri('https://api.mailgun.net/v3/')
            ->setEndpoint($endpoint)
            ->setData($data)
            ->check();
    }
}
