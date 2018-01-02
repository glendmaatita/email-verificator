<?php

namespace EmailVerificator;

use EmailVerificator\Requests\AmazonSesRequest;
use EmailVerificator\Requests\MailboxlayerRequest;
use EmailVerificator\Requests\MailgunRequest;

class Verificator
{
    public static function verify($provider, $data)
    {
        $provider = ProviderFactory::get($provider, $data);
        return $provider->check();
    }
}
