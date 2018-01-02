<?php

namespace EmailVerificator\Providers\Requests;

use EmailVerificator\RequestInterface;

class AmazonSesRequest implements RequestInterface
{
    protected $emailAddress;

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function build()
    {

    }
}
