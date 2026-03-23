<?php

namespace App\Services;

use App\Repositories\StandsRepository;
use Illuminate\Support\Str;

class StandService
{
    public function __construct(protected StandsRepository $standsRepository)
    {

    }
    public function getall($meetingId)
    {
        return $this->standsRepository->getByMeetingId($meetingId);
    }
}
