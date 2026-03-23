<?php

namespace App\Repositories;

use App\Models\Meeting;
use App\Models\Photo;
use App\Models\Stand;

class PhotesRepository extends Repository
{
    public function getModelClass():string
    {
        return Photo::class;
    }
    public function getByStandId(string $standId)
    {
        return $this->getBuilder()
            ->from(Photo::TABLE_NAME, 'p')
            ->select('p.'.Photo::FIELD_STAND_ID,
                             'p.'.Photo::FIELD_USER_NAME,
                             's.'.Stand::FIELD_ID,
                             'm.'.Meeting::FIELD_NAME,
                             'p.'.Photo::FIELD_NAME_MINI,
                             'p.'.Photo::FIELD_DATE_LAST_ORDER)
            ->leftJoin(Stand::TABLE_NAME.' As s',
                        'p.'.Photo::FIELD_STAND_ID,'=','s.'.Stand::FIELD_ID)
            ->leftJoin(Meeting::TABLE_NAME.' AS m',
                        'm.'.Meeting::FIELD_ID,'=','s.'.Stand::FIELD_MEETING_ID)
            ->where('p.'.Photo::FIELD_STAND_ID,'=',$standId)
            ->get();
    }
}
