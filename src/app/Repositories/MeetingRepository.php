<?php

namespace App\Repositories;

use App\Models\Meeting;

/**
 * @method Meeting getById(string $id)
 * @method Meeting[] getAll()
 */
class MeetingRepository extends Repository
{
    public function getModelClass():string
    {
        return Meeting::class;
    }

}
