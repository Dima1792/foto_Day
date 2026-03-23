<?php

namespace App\Http\Controllers;

use App\Services\PhotoService;


class PhotoController
{
    public function list(PhotoService $photoService, String $stand)
    {
        return view(
            'ListPhotos',
            ['Photos' => $photoService->getall($stand)]
        );
    }
}
