<?php

namespace App\Http\Controllers;

use App\Services\QRServis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class GetPDFController extends Controller
{
    public function generatePDF(QRServis $QRServis)
    {
        $qrCodes = $QRServis->MultiGenarateQR(10,'google.com');

        $pdf = Pdf::loadView('GetPDF', compact('qrCodes'));

        return $pdf->stream('12_qrcodes.pdf');
    }

    public function GetQRforLimite(Request $request, QRServis $QRServis)
    {
        $key = 'controller-access:' . ($request->user()?->id ?: $request->ip());

        // Проверяем, не превышен ли лимит (например, 5 запросов в минуту)
        if (RateLimiter::tooManyAttempts($key, $maxAttempts = 5)) {
            $seconds = RateLimiter::availableIn($key);

            return response()->json([
                'message' => "Слишком много запросов. Подождите {$seconds} сек. до следующего доступа."
            ], 429);
        }


        RateLimiter::hit($key, 120);

        $qrCodes = $QRServis->MultiGenarateQR(10,'google.com');

        $pdf = Pdf::loadView('GetPDF', compact('qrCodes'));

        return $pdf->stream('12_qrcodes.pdf');
    }

}

