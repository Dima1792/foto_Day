<?php

namespace App\Http\Controllers;

use App\Services\MeetingServices;

class MeetingController
{
    public function list(MeetingServices $meetingServices)
    {
        return view(
            'ListMeeting',
            ['meetings' => $meetingServices->getall()]
        );
    }
}
