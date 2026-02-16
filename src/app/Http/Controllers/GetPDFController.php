<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSize;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;

class GetPDFController extends Controller
{
    public function generatePDF()
    {
        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: 'https://example.com',
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 200,
            margin: 10,
        );

        $result = $builder->build();

        // Получаем Data URI для вставки в <img> в шаблоне Blade
        $qrCodeBase64 = $result->getDataUri();
        // 3. Передача данных в PDF
        $pdf = Pdf::loadView('GetPDF', ['qrCode' => $qrCodeBase64]);

        return $pdf->download('document_with_qr.pdf');
    }
}
