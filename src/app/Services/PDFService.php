<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Exception\ValidationException;

class PDFService
{
    public function __construct(protected QRService $QRService)
    {

    }

    /**
     * @throws ValidationException
     */
    public function getQrPDF(array $urls):\Barryvdh\DomPDF\PDF
    {
        $qrCodes= $this->QRService->multiGenerateQR($urls);

        return Pdf::loadView('GetPDF', compact('qrCodes'));
    }

}
