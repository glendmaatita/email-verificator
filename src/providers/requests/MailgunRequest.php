<?php

namespace EmailVerificator\Providers\Requests;

use EmailVerificator\RequestInterface;

class MailgunRequest implements RequestInterface
{
    protected $address;
    protected $apiKey;
    protected $mailboxVerification;
    protected $isPrivate;

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setMailboxVerification($mailboxVerification)
    {
        $this->mailboxVerification = $mailboxVerification;
        return $this;
    }

    public function getMailBoxVerification()
    {
        return $this->mailboxVerification;
    }

    public function setIsPrivate($isPrivate)
    {
        $this->isPrivate = $isPrivate;
        return $this;
    }

    public function getIsPrivate()
    {
        return $this->isPrivate;
    }

    public function build()
    {

    }
}
