<?php

namespace App\Services;

use App\Repositories\MeetingRepository;

class MeetingServices
{
    public function __construct(protected MeetingRepository $meetingRepository)
    {

    }
    public function getall()
    {
        return $this->meetingRepository->getAll();
    }
}
