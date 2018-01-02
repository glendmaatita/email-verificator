<?php

namespace EmailVerificator;

use EmailVerificator\Providers\AmazonSes;
use EmailVerificator\Providers\Mailboxlayer;
use EmailVerificator\Providers\Mailgun;

class ProviderFactory
{
    const MAILGUN = 'mailgun';
    const AMAZON_SES = 'amazon_ses';
    const MAILBOXLAYER = 'mailboxlayer';

    public static function get($provider, $data, $options = [])
    {
        switch ($provider) {
            case self::MAILGUN:
                return new Mailgun($data, $options);
            case self::MAILBOXLAYER:
                return new Mailboxlayer($data, $options);
            case self::AMAZON_SES:
                return new AmazonSes($data, $options);
            default: // throw exception here
                throw new Exception("Provider not found", 1);
                break;
        }
    }
}
