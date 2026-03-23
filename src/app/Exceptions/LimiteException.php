<?php

namespace App\Exceptions;

class LimiteException extends \Exception
{
    protected $seconds;

    public function __construct($seconds)
    {
        $this->seconds = $seconds;
        parent::__construct("Wait {$seconds} seconds");
    }

    public function getSeconds()
    {
        return $this->seconds;
    }
}
