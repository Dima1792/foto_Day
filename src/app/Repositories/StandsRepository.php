<?php declare(strict_types=1);

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
    public function getNewModel()
    {
        $modelClass = $this->getModelClass();
        return new $modelClass;
    }
    public function getByMeetingId(string $meetingId)
    {
        return $this->getBuilder()
            ->from(Meeting::TABLE_NAME, 'm')
            ->select(   's.'.Stand::FIELD_ID,
                                'm.'.Meeting::FIELD_NAME,
                                's.'.Stand::FIELD_CODE,
                                's.'.Stand::FIELD_MEETING_ID,
                                's.'.Stand::FIELD_USER_ID,
                                's.'.Stand::FIELD_STATUS)
            ->leftJoin(Stand::TABLE_NAME.' As s',
                        'm.'.Meeting::FIELD_ID,'=','s.'.Stand::FIELD_MEETING_ID)
            ->where('m.'.Meeting::FIELD_ID,'=',$meetingId)
            ->get();
    }

    public function getMeetingNameByPhotoId(string $photoId)
    {
        $result = $this->getBuilder()
            ->from(Photo::TABLE_NAME,'p')
            ->select(   's.'.Stand::FIELD_ID,
                                'm.'.Meeting::FIELD_NAME,'s.'.Stand::FIELD_CODE,
                                's.'.Stand::FIELD_MEETING_ID,
                                's.'.Stand::FIELD_USER_ID,
                                's.'.Stand::FIELD_STATUS)
            ->leftJoin(Stand::TABLE_NAME.' As s',
                        'p.'.Photo::FIELD_STAND_ID,'=','s.'.Stand::FIELD_ID)
            ->leftJoin(Meeting::TABLE_NAME.' As m',
                        's.'.Stand::FIELD_MEETING_ID,'=','m.'.Meeting::FIELD_ID)
            ->where('p.'.Photo::FIELD_ID,'=',$photoId)
            ->first();
        dd($result);
    }

}
