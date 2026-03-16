<?php

namespace App\Repositories;

use App\Models\Meeting;
use App\Models\Photo;
use App\Models\Stand;

class StandsRepository extends Repository
{
    public function getModelClass():string
    {
        return Stand::class;
    }
    public function getByMeetingId(string $meetingId)
    {
        return $this->getBuilder()
            ->from(Stand::TABLE_NAME, 's')
            ->select('s.'.Stand::FIELD_ID, 's.'.Stand::FIELD_CODE,  's.'.Stand::FIELD_MEETING_ID,  's.'.Stand::FIELD_USER_ID, 's.'.Stand::FIELD_STATUS)
            ->leftJoin('photos as p', 's.'.Stand::FIELD_ID,'=','p.'.Photo::FIELD_STAND_ID)
            ->rightJoin('meetings as m','s.'.Stand::FIELD_ID,'=','m.'.Meeting::FIELD_ID)
            ->where('s.'.Stand::FIELD_MEETING_ID,'=',$meetingId)
            ->get();
    }
    public function getAll()
    {
        return $this->getBuilder()->get();
    }
}
