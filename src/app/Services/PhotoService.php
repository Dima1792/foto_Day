<?php

namespace App\Services;

use App\Models\Photo;
use App\Repositories\PhotesRepository;
use Illuminate\Support\Facades\Auth;

class PhotoService
{
    public function __construct(protected PhotesRepository $photesRepository)
    {

    }
    public function getall($standId)
    {
        return $this->photesRepository->getByStandId($standId);
    }
    public function PhotosForUser($standId,$userId)
    {
        return $this->photesRepository->getByStandIdAndUserId($standId,$userId);
    }
    public function save(string $stand_id,string $path)
    {
        $photo = new Photo();
        $photo->stand_id =$stand_id;
        $photo->real_name_full = $path;
        $photo->user_name = Auth::id();
        $photo->name_mini = $request->name_mini ?? 'photo_' . time();
        $photo->sum = 0;
        $photo->sum_for_client = 0;
        $photo->date_last_order = now();
        $photo->save();
    }
}
