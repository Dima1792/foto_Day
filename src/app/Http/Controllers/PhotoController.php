<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Services\PhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function list(PhotoService $photoService, $standId)
    {
        $Photos = $photoService->getall($standId);
        return view('ListPhotos', [
            'Photos' => $Photos,
            'standId' => $standId
        ]);
    }
    public function listPhotosForUser(PhotoService $photoService, $standId)
    {
        $Photos = $photoService->PhotosForUser($standId, Auth::id());
        return view('ListPhotos', [
            'Photos' => $Photos,
            'standId' => $standId
        ]);
    }
    public function loader(Request $request)
    {
        $standId = $request->query('stand_id');
        if (!$standId) {
            return redirect()->back()->with('error', 'ID стенда не передан');
        }
        return view('photoCreate', compact('standId'));
    }
    public function store(StorePhotoRequest $request,PhotoService $photoService)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $photoService->save($request->stand_id, $file->store('photos', 'public'));

            return redirect()->route('photoList', ['photo' => $request->stand_id]);
        }
    }
}
