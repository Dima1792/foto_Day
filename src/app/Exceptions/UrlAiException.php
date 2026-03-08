<?php

namespace App\Exceptions;

use App\Exceptions;

class UrlAiException extends \Exception
{
    protected $url;
    public function __construct($url)
    {
        $this->url = $url;
        parent::__construct("Введен {$url}");
    }
    public function getUrl()
    {
        return $this->url;
    }
}
