<?php

namespace EmailVerificator\Providers\Requests;

use EmailVerificator\RequestInterface;

class MailboxlayerRequest implements RequestInterface
{
    protected $email;
    protected $accessKey;
    protected $format;
    protected $smtpCheck;
    protected $catchAll;

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setAccesKey($accessKey)
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    public function getAccessKey()
    {
        return $this->accessKey;
    }

    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setSmtpCheck($smtpCheck)
    {
        $this->smtpCheck = $smtpCheck;
        return $this;
    }

    public function getSmtpCheck()
    {
        return $this->smtpCheck;
    }

    public function setCatchAll($catchAll)
    {
        $this->catchAll = $catchAll;
        return $this;
    }

    public function getCatchAll()
    {
        return $this->catchAll;
    }

    public function build()
    {

    }
}
