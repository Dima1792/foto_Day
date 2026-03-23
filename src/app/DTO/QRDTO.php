<?php declare(strict_types=1);

namespace App\DTO;

class QRDTO
{
    public function __construct(public string $qr, public string $id)
    {
    }
}
