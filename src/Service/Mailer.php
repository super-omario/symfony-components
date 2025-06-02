<?php

namespace App\Service;

class Mailer
{
    public function __construct(private string $transport)
    {
    }

    public function getTransport(): string
    {
        return $this->transport;
    }
}
