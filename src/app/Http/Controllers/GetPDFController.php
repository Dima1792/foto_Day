<?php

namespace App\Http\Controllers;

use App\Services\PDFService;
use App\Services\QRService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Endroid\QrCode\Exception\ValidationException;

class GetPDFController extends Controller
{
    public function generatePDF(QRService $QRServis)
    {
        $qrCodes = $QRServis->multiGenerateQR(10,'google.com');

        $pdf = Pdf::loadView('GetPDF', compact('qrCodes'));

        return $pdf->stream('12_qrcodes.pdf');
    }

    public function GetQRforLimite(Request $request, QRService $QRService, PDFService $PDFService)
    {
        $key = 'controller-access:3' . ($request->user()?->id ?: $request->ip());

        if (RateLimiter::tooManyAttempts($key,2)) {
            $seconds = RateLimiter::availableIn($key);

            return response()->json([
                'message' => "Слишком много запросов. Подождите {$seconds} сек. до следующего доступа."
            ], 429);
        }

        RateLimiter::hit($key, 60);

        $urls =[];
        $urls[0] = 'google.com';
        $urls[1] = 'yandex.ru';
//        try {
//            $qrCodes = $QRService->multiGenerateQR();
//        }
//       catch (ValidationException $exception){
//            Log::error($exception->getMessage());
//       }
//       catch (\Exception $exception){
//            Log::error($exception->getMessage());
//       }



        return $PDFService->getQrPDF($urls)->stream('12_qrcodes.pdf');
    }

}

