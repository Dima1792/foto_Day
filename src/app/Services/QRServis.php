<?php

namespace App\Services;

use App\DTO\QRDTO;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QRServis
{
    public function GetItemDTO($url,$label)
    {
        return new QRDTO($url,$label);
    }
    public function GenereteQR($url)
    {
        $builder = new Builder(
            writer: new PngWriter(),
            data: $url,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Medium,
            size: 50,
            margin: 5,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            labelText:'Ссылка для перехода на сайт' . $url
        );
        return $builder->build()->getDataUri();
    }
    public function MultiGenarateQR($count,$url):array
    {
        $arrayReturn=[];
        for($i = 1; $i <= $count; $i++) {
            $arrayReturn[$i] = $this->GetItemDTO($this->GenereteQR($url),('Запись №' . $i));
        }
        return $arrayReturn;
    }
}
