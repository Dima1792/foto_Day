<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\GetPDFController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/get-PDF', [ GetPDFController::class, 'generatePDF']);
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

