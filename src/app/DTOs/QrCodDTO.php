<?php declare(strict_types=1);


namespace App\DTOs;

readonly class QrCodDTO
{
    public function __construct(
        public string $qr,
        public string $id
    )
    {

    }

}
