<?php

namespace App\Services;

use App\Models\Meeting;
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
    public function save(Meeting $meeting)
    {
        $this->meetingRepository->save($meeting);
    }
}
