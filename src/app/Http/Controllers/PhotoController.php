<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePhotoRequest;
use App\Services\PhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function list(PhotoService $photoService, $photo)
    {
        $Photos = $photoService->getall($photo);
        return view('ListPhotos', [
            'Photos' => $Photos,
            'standId' => $photo
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
    public function store(StorePhotoRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('photos', 'public');
            $photo = new \App\Models\Photo();
            $photo->stand_id = $request->stand_id;
            $photo->real_name_full = $path;
            $photo->user_name = Auth::id();
            $photo->name_mini = $request->name_mini ?? 'photo_' . time();
            $photo->sum = 0;
            $photo->sum_for_client = 0;
            $photo->date_last_order = now();

            $photo->save();

            return redirect()->route('photoList', ['photo' => $request->stand_id])
                ->with('success', 'Фото загружено!');
        }
    }
}
