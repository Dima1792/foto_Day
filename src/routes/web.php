<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\GetPDFController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\PhotoController;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/get-PDF', [ GetPDFController::class, 'generatePDF']);
Route::get('/meeting/list',[MeetingController::class, 'list'])->name('meetingList');
Route::get('/meeting/create', [MeetingController::class, 'create'])->name('meeting.create');
Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
Route::get('/stand/create', [StandController::class, 'create'])->name('stand.create');
Route::post('/stands', [StandController::class, 'store'])->name('stands.store');
Route::get('/stand/{stand?}',[StandController::class, 'list'])->name('standList');
Route::get('/photo/load{standId}', [PhotoController::class, 'loader'])->name('loadPhoto');
Route::post('/photos', [PhotoController::class, 'store'])->name('photo.store');
Route::get('/photo/{standId}', [PhotoController::class, 'listPhotosForUser'])->name('photoList');
Route::get('/input-urls', function () { return view('inputArrayUrl',[]); });
Route::middleware(['auth'])->group(function () {
    Route::get('/generate-pdf', [GetPDFController::class, 'generatePDF'])
        ->middleware('throttle:5,2');
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('throttle:user-api')->post('/getQR', [GetPDFController::class, 'GetQRforLimite','urls'])->name('getQR');
require __DIR__.'/settings.php';
Route::get(
    '/testPhoto/{id}',
    function (int $id, \App\Repositories\StandsRepository $repository) {
        $repository->getMeetingNameByPhotoId($id);
    }
);

