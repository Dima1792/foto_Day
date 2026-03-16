<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Services\StandService;

class StandController
{
    public function list(StandService $standServices, String $stand)
    {
        return view(
            'ListStands',
            ['Stands' => $standServices->getall($stand)]
        );
    }
}
