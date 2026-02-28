<?php

namespace App\DTO;

class QRDTO
{
    public function __construct(public string $qr, public string $id)
    {
    }
}
