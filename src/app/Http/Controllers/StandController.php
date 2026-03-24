<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandRequest;
use App\Models\Stand;
use App\Repositories\StandsRepository;
use App\Services\StandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandController
{
    public function list(StandService $standServices, String $stand)
    {
        return view(
            'ListStands',
            ['Stands' => $standServices->getall($stand)]
        );
    }
    public function create(Request $request)
    {
        $meetingId = $request->query('meeting_id');

        return view('standsCreate', compact('meetingId'));
    }

    public function store(StoreStandRequest $request,StandService $standService,StandsRepository $repository)
    {
        $stand = $repository->getNewModel();
        $stand->code = $request->code;
        $stand->meeting_id = $request->meeting_id;
        $stand->status = $request->status;
        $stand->user_id = Auth::id();
        $standService->save($stand);

        return redirect()->route('standList', ['stand'=> $request->meeting_id]);
    }
}
