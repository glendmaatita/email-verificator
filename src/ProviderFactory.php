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

    public static function get($provider, $data = [])
    {
        switch ($provider) {
            case self::MAILGUN:
                return new Mailgun($data);
            case self::MAILBOXLAYER:
                return new Mailboxlayer($data);
            case self::AMAZON_SES:
                return new AmazonSes($data);
            default: // throw exception here
                throw new Exception("Provider not found", 1);
                break;
        }
    }
}
