<?php

namespace App\Http\Controllers;

use App\Services\LimiterService;
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

    public function GetQRforLimite(Request $request,  PDFService $PDFService, LimiterService $limiterService)
    {
        $key = 'controller-access:3' . ($request->user()?->id ?: $request->ip());

        $limiterService->checkLimite($key, 2,60);
        $urls= $request->input('urls');
        return $PDFService->getQrPDF($urls)->stream('12_qrcodes.pdf');
    }

}

