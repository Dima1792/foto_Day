<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class GetPDFController extends Controller
{
    public function generatePDF()
    {
        $qrCodes = [];

        // Генерируем 12 разных QR-кодов
        for ($i = 1; $i <= 100; $i++) {
            $builder = new Builder(
                writer: new PngWriter(),
                data: "Item ID: " . $i, // Здесь ваши данные
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::Medium,
                size: 50,
                margin: 5,
                roundBlockSizeMode: RoundBlockSizeMode::Margin
            );

            // Сохраняем Data URI в массив
            $qrCodes[] = $builder->build()->getDataUri();
        }
        $pdf = Pdf::loadView('GetPDF', compact('qrCodes'));

        return $pdf->stream('12_qrcodes.pdf');
    }
}

