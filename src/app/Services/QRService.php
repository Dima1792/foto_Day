<?php declare(strict_types=1);

namespace App\Services;

use App\DTO\QRDTO;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Exception\ValidationException;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QRService
{
    public function getItemDTO(string $qr, string $id):QRDTO
    {
        return new QRDTO($qr, $id);
    }

    /**
     * @throws ValidationException
     */
    public function generateQR(string $url): string
    {
        $builder = new Builder(
            writer: new PngWriter(),
            data: $url,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Medium,
            size: 150,
            margin: 5,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            labelText:'Ссылка для перехода на сайт' . $url
        );

        return $builder->build()->getDataUri();
    }

    /**
     * @throws ValidationException
     */
    public function multiGenerateQR(array $urls):array
    {
        $arrayReturn = [];
        foreach ($urls as $index => $url) {
            $arrayReturn[$index] = $this->getItemDTO(
                $this->generateQR($this->generateQR($url)),
                ("Запись №" . $index)
            );
        }
        return $arrayReturn;
    }
}
