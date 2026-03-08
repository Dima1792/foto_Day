<?php declare(strict_types=1);

namespace App\Services;

use App\DTO\QRDTO;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Exception\ValidationException;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use App\Exceptions\UrlAiException;
use Illuminate\Support\Facades\Log;

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
            size: 100,
            margin: 5,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
        );

        return $builder->build()->getDataUri();
    }

    /**
     * @throws UrlAiException
     * @throws ValidationException
     */
    public function multiGenerateQR(array $urls):array
    {
        $arrayQR = [];
        $arrayIncorrectQR = [];
        foreach ($urls as $index => $url) {
            if (empty($url)||!is_string($url)) {
                continue;
            }
            if (str_ends_with(strtolower($url), '.ai')) {
                Log::channel('bad_urls')->info("Попытка генерации запрещенного URL: {$url}", [
                    'ip' => request()->ip(),
                    'user_id' => auth()->id() ?? 'guest'
                ]);
                $arrayIncorrectQR[] = $url;
                continue;
            }
            $arrayQR[$index] = $this->getItemDTO(
                $this->generateQR($url),
                ("Запись №" . $index)
            );
        }
        return ['codes' => $arrayQR,
        'unCodes' => $arrayIncorrectQR
        ];
    }
}
