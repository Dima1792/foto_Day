<?php

namespace App\Services;

use App\Models\Stand;
use App\Repositories\StandsRepository;

class StandService
{
    public function __construct(protected StandsRepository $standsRepository)
    {

    }
    public function getall($meetingId)
    {
        return $this->standsRepository->getByMeetingId($meetingId);
    }
    public function save(Stand $stand)
    {
        $this->standsRepository->save($stand);
    }
}
