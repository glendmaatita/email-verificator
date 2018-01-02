<?php

namespace EmailVerificator;

use EmailVerificator\Requests\AmazonSesRequest;
use EmailVerificator\Requests\MailboxlayerRequest;
use EmailVerificator\Requests\MailgunRequest;

class RequestAdapter
{
    const MAILGUN = 'mailgun';
    const AMAZON_SES = 'amazon_ses';
    const MAILBOXLAYER = 'mailboxlayer';

    protected $provider;
    protected $mailgunRequest;
    protected $mailboxlayerRequest;
    protected $amazonsesRequest;

    private function __construct(
        $provider,
        MailgunRequest $mailgunRequest,
        MailboxlayerRequest $mailboxlayerRequest,
        AmazonSesRequest $amazonsesRequest) {
            $this->provider = $provider;
            $this->mailgunRequest = $mailgunRequest;
            $this->mailboxlayerRequest = $mailboxlayerRequest;
            $this->amazonsesRequest = $amazonsesRequest;
        }

    public static function get($provider)
    {
        return new static($provider, new MailgunRequest(), new MailboxlayerRequest(), new AmazonSesRequest());
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    public function setAddress($address)
    {
        $this->mailgunRequest->setAddress($address);
        return $this;
    }

    public function setApiKey($apiKey)
    {
        $this->mailgunRequest->setApiKey($apiKey);
        return $this;
    }

    public function setMailboxVerification($mailboxVerification)
    {
        $this->mailgunRequest->setMailboxVerification($mailboxVerification);
        return $this;
    }

    public function setIsPrivate($isPrivate)
    {
        $this->mailgunRequest->setIsPrivate($isPrivate);
        return $this;
    }

    public function setEmail($email)
    {
        $this->mailboxlayerRequest->setEmail($email);
        return $this;
    }

    public function setAccesKey($accessKey)
    {
        $this->mailboxlayerRequest->setAccesKey($accessKey);
        return $this;
    }

    public function setFormat($format)
    {
        $this->mailboxlayerRequest->setFormat($format);
        return $this;
    }

    public function setSmtpCheck($smtpCheck)
    {
        $this->mailboxlayerRequest->setSmtpCheck($smtpCheck);
        return $this;
    }

    public function setCatchAll($catchAll)
    {
        $this->mailboxlayerRequest->setCatchAll($catchAll);
        return $this;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->amazonsesRequest->setEmailAddress($emailAddress);
        return $this;
    }

    public function build()
    {
        switch ($this->provider) {
            case self::MAILGUN:
                return $this->mailgunRequest->build();
            case self::MAILBOXLAYER:
                return $this->mailboxlayerRequest->build();
            case self::AMAZON_SES:
                return $this->amazonsesRequest->build();
            default:
                // throw exception here
                throw new Exception("Provider not found", 1);
                break;
        }
    }
}
