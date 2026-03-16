<?php

namespace App\Repositories;

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
        return $this->getBuilder()//->where(Photo::FIELD_STAND_ID,'=', $standId)->get();
            ->from(Photo::TABLE_NAME, 'p')
            ->select('p.'.Photo::FIELD_STAND_ID,
                             'p.'.Photo::FIELD_USER_NAME,
                             's.'.Stand::FIELD_ID,
                             'p.'.Photo::FIELD_NAME_MINI,
                             'p.'.Photo::FIELD_DATE_LAST_ORDER)
            ->leftJoin('stands as s', 'p.'.Photo::FIELD_STAND_ID,'=','s.'.Stand::FIELD_ID)
            ->where('p.'.Photo::FIELD_STAND_ID,'=',$standId)
            ->get();
    }
    public function getAll()
    {
        return $this->getBuilder()->get();
    }
}
