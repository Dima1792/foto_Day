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
        $result = $this->QRService->multiGenerateQR($urls);
        $qrCodes = $result['codes'];
        $unCode = $result['unCodes'];
        $count = count($qrCodes);
        return Pdf::loadView('GetPDF', compact('qrCodes', 'count', 'unCode'));
    }
}
