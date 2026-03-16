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
        $result =(int) Str::of($meetingId)->match('/Meeting\s+(\d+)\s+for/')->toString();
        return $this->standsRepository->getByMeetingId($result);
    }
}
