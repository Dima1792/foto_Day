<?php

namespace App\Http\Controllers;

use App\Repositories\MeetingRepository;
use App\Services\MeetingServices;
use App\Http\Requests\StoreMeetingRequest;
use Illuminate\Support\Facades\Auth;

class MeetingController
{
    public function list(MeetingServices $meetingServices)
    {
        $meetings = $meetingServices->getall();
        return view('ListMeeting', compact('meetings'));
    }

    public function create()
    {
        return view('meetingsСreate');
    }


    public function store(StoreMeetingRequest $request,MeetingServices $meetingServices,MeetingRepository $repository)
    {
        $meeting = $repository->getNewModel();
        $meeting->name = $request->name;
        $meeting->link = $request->link;
        $meeting->agency_id = $request->agency_id;
        $meeting->sum_default = $request->sum_default ?? '0';
        $meeting->date_start = $request->date_start;
        $meeting->date_end = $request->date_end;
        $meeting->user_id = Auth::id() ;
        $meetingServices->save($meeting);

        return redirect()->route('meetingList');
    }
}


