<?php

namespace App\Http\Controllers;

use App\Services\QRServis;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class GetPDFController extends Controller
{
    public function generatePDF(QRServis $QRServis)
    {
        $qrCodes = $QRServis->MultiGenarateQR(10,'google.com');

        $pdf = Pdf::loadView('GetPDF', compact('qrCodes'));

        return $pdf->stream('12_qrcodes.pdf');
    }
}

