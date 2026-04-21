<?php

namespace App\Repositories;

use App\Models\Meeting;

/**
 * @method Meeting getById(string $id)
 * @method Meeting[] getAll()
 */
class MeetingRepository extends Repository
{
    public function getNewModel()
    {
        $modelClass = $this->getModelClass();
        return new $modelClass;
    }
    public function getModelClass():string
    {
        return Meeting::class;
    }

}
