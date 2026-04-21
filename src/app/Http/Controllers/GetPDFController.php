<?php

namespace App\Http\Controllers;

use App\Exceptions\LimiteException;
use App\Services\LimiterService;
use App\Services\PDFService;
use App\Services\QRService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Exceptions\UrlAiException;
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

        try {

            $limiterService->checkLimite($key, 2, 20);
        } catch (LimiteException $exception) {
            return back()->with([
                'timeLimitation' => $exception->getSeconds(),
                'message' => "Слишком много попыток! Запрашивать QR можно не чаще чем рав минуту."
            ]);
        } catch (\Exception $e) {
            return back()->with('urlError', 'Произошла непредвиденная ошибка.');
        }
        $PDF = $PDFService->getQrPDF($request->input('urls'));
        return $PDF->stream('12_qrcodes.pdf');
    }

}

