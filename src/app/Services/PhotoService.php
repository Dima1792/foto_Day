<?php

namespace App\Services;

use App\Repositories\PhotesRepository;

class PhotoService
{
    public function __construct(protected PhotesRepository $photesRepository)
    {

    }
    public function getall($standId)
    {
        return $this->photesRepository->getByStandId($standId);
    }
}
