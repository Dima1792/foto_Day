<?php

namespace App\Repositories;

use App\Models\Meeting;

class MeetingRepository extends Repository
{
    public function getModelClass():string
    {
        return Meeting::class;
    }
    public function getbyid(string $id)
    {
        return $this->getBuilder()->where(Meeting::FIELD_ID, '=', $id)->first();
    }
    public function getAll()
    {
        return $this->getBuilder()->get();
    }
}
